<?php

/*
 * This file is part of the ricbra/discogs-bundle,
 * Forked by AnssiAhola/php-discogs-api,
 * Forked by calliostro/php-discogs-api,
 * and then forked by me, w3spi5/php-discogs-api.
 *
 * Initial copyright. The actual version follow same rights, see below.
 *
 * (c) Richard van den Brand <richard@vandenbrand.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wespify\Discogs\Test\Subscriber;

use Wespify\Discogs\Subscriber\ThrottleSubscriber;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class ThrottleSubscriberTest extends TestCase
{

    public function testInstantiation(): void
    {
        $throttle = new ThrottleSubscriber();
        $this->assertInstanceOf(ThrottleSubscriber::class, $throttle);
    }

    public function testWithThrottle(): void
    {
        $throttle = 2000; // milliseconds == 2 sec
        $subscriber = new ThrottleSubscriber($throttle);

        $before = microtime(true);

        $handler = HandlerStack::create(new MockHandler([
            new Response(429),
            new Response(200)
        ]));
        $handler->push(Middleware::retry($subscriber->decider(), $subscriber->delay()));
        $client = new Client(['handler' => $handler]);
        $client->request('GET', '/');

        $after = microtime(true);

        $difference = $after - $before;
        // Should be at least 2 seconds
        $this->assertTrue($difference > 4);
    }

    public function testWithoutThrottle(): void
    {
        $throttle = 0;
        $subscriber = new ThrottleSubscriber($throttle);

        $before = microtime(true);

        $handler = HandlerStack::create(new MockHandler([
            new Response(429),
            new Response(200)
        ]));
        $handler->push(Middleware::retry($subscriber->decider(), $subscriber->delay()));
        $client = new Client(['handler' => $handler]);
        $client->request('GET', '/');

        $after = microtime(true);

        $difference = $after - $before;
        // Should be at max 0.5 seconds on a very slow system, tricky to test
        $this->assertTrue($difference < 0.5);
    }

    public function testMaxRetries(): void
    {
        $throttle = 500;
        $max_retries = 2;
        $subscriber = new ThrottleSubscriber($throttle, $max_retries);

        $before = microtime(true);

        $handler = HandlerStack::create(new MockHandler([
            new Response(429),
            new Response(429),
            new Response(429),
        ]));
        $handler->push(Middleware::retry($subscriber->decider(), $subscriber->delay()));
        $client = new Client(['handler' => $handler]);
        try {
            $client->request('GET', '/');
        } catch (Exception $e) {
            $this->assertInstanceOf(ClientException::class, $e);
            $this->assertEquals(429, $e->getCode());
        }

        $after = microtime(true);
        $difference = $after - $before;

        $this->assertTrue($difference > 3);
    }
}
