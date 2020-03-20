<?php

namespace Niklan\Dadata\Tests\Clean;

use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Discovery\HttpClientDiscovery;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Http\Mock\Client;
use Niklan\Dadata\ApiClient;
use Niklan\Dadata\Auth;
use PHPUnit\Framework\TestCase;

/**
 * Provides test for AddressCleaner clean request.
 */
final class AddressTest extends TestCase {

  public function testRequest(): void {
    $dadata_auth = new Auth('dadata-token');
    $authentication = new AuthenticationPlugin($dadata_auth);
    $client = new Client();
    $factory = new GuzzleMessageFactory();
    $api = new ApiClient($client, $factory);
  }

}
