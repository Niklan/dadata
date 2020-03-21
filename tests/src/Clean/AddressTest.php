<?php

namespace Niklan\Dadata\Tests\Clean;

use Http\Mock\Client;
use Niklan\Dadata\DadataClient;
use Niklan\Dadata\Auth;
use Niklan\Dadata\Request\Cleaner\AddressCleaner;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Provides test for AddressCleaner clean request.
 */
final class AddressTest extends TestCase {

  public function testRequest(): void {
    $response_body = $this->prophesize(StreamInterface::class);
    $response_body->getContents()->willReturn(file_get_contents(__DIR__ . '/../../fixtures/clean-address-response.json'));

    $default_response = $this->prophesize(ResponseInterface::class);
    $default_response->getStatusCode()->willReturn(200);
    $default_response->getBody()->willReturn($response_body->reveal());

    $dadata_auth = new Auth('dadata-token', 'dadata-secret');
    $http_client = new Client();
    $http_client->addResponse($default_response->reveal());
    $dadata_client = new DadataClient($http_client, $dadata_auth);
    $address_cleaner = new AddressCleaner($dadata_client);
    $response = $address_cleaner->clean('мск сухонска 11/-89');
    $this->assertSame(200, $response->getStatusCode());
  }

}
