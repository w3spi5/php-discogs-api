<?php
/*
 * (c) Waarneembemiddeling.nl
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Discogs\Test;

use Discogs\ClientFactory;
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
