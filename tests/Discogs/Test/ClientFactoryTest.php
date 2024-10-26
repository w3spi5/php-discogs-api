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

namespace Wespify\Discogs\Test;

use Wespify\Discogs\ClientFactory;
use PHPUnit\Framework\TestCase;

final class ClientFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $client = ClientFactory::factory();
        $default = ['User-Agent' => 'php-discogs-api/2.0.0 +https://github.com/w3spi5/php-discogs-api'];
        $this->assertSame($default, $client->getHttpClient()->getConfig('headers'));
    }

    public function testFactoryWithCustomUserAgent(): void
    {
        $client = ClientFactory::factory([
            'headers' => ['User-Agent' => 'test'],
        ]);
        $default = ['User-Agent' => 'test'];
        $this->assertSame($default, $client->getHttpClient()->getConfig('headers'));
    }

    public function testFactoryWithCustomDefaultNotInClassDefaults(): void
    {
        $client = ClientFactory::factory([
            'headers' => ['User-Agent' => 'test'],
            'query' => [
                'key' => 'my-key',
                'secret' => 'my-secret',
            ],
        ]);
        $default_headers = ['User-Agent' => 'test'];
        $default_query = [
            'key' => 'my-key',
            'secret' => 'my-secret',
        ];
        $this->assertSame($default_headers, $client->getHttpClient()->getConfig('headers'));
        $this->assertSame($default_query, $client->getHttpClient()->getConfig('query'));
    }
}
