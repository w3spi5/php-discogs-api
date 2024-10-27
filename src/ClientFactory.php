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

namespace Wespify\Discogs;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;

final class ClientFactory
{
    public static function factory(array $config = []): DiscogsClient
    {
        $defaultConfig = [
            'headers' => ['User-Agent' => 'php-discogs-api/2.0.0 +https://github.com/w3spi5/php-discogs-api'],
            'auth' => 'oauth',
        ];

        $client = new Client(self::mergeRecursive($defaultConfig, $config ?? []));
        $service = include __DIR__ . '/../resources/service.php';
        $description = new Description($service);

        return new DiscogsClient($client, $description);
    }

    private static function &mergeRecursive(array $array1, $array2 = null): array
    {
        $merged = $array1;

        if (is_array($array2)) {
            foreach ($array2 as $key => $val) {
                if (is_array($val)) {
                    $merged[$key] = isset($merged[$key]) && is_array($merged[$key]) ?
                        self::mergeRecursive($merged[$key], $val) : $val;
                } else {
                    $merged[$key] = $val;
                }
            }
        }
        return $merged;
    }
}
