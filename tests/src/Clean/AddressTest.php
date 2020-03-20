<?php

namespace Niklan\Dadata\Tests\Clean;

use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Discovery\HttpClientDiscovery;
use Niklan\Dadata\ApiClient;
use Niklan\Dadata\Auth;
use PHPUnit\Framework\TestCase;

/**
 * Provides test for Address clean request.
 */
final class AddressTest extends TestCase {

  public function testRequest(): void {
    $dadata_auth = new Auth('dadata-token');
    $authentication = new AuthenticationPlugin($dadata_auth);
    $client = HttpClientDiscovery::find();
    $api = new ApiClient($client, $authentication);
  }

}
