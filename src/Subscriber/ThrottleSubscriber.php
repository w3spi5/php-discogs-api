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

namespace Wespify\Discogs\Subscriber;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final class ThrottleSubscriber
{
    private $throttle;
    private $max_retries;

    /**
     * @param int $throttle wait time between retries, in milliseconds
     */
    public function __construct(int $throttle = 1000, int $max_retries = 5)
    {
        $this->throttle = $throttle;
        $this->max_retries = $max_retries;
    }

    public function decider(): callable
    {
        return function (
            int $retries,
            Request $request,
            Response $response = null,
            TransferException $exception = null
        ) {
            if ($retries >= $this->max_retries) {
                return false;
            }

            // Retry on connection exceptions
            if ($exception instanceof ConnectException) {
                return true;
            }

            if ($response) {
                if ($response->getStatusCode() == 429) {
                    return true;
                }
                // Retry on server errors
                if ($response->getStatusCode() >= 500) {
                    return true;
                }
            }

            return false;
        };
    }

    public function delay(): callable
    {
        return function (int $retries) {
            return $this->throttle * (2 ** $retries);
        };
    }
}
