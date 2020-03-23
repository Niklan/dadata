<?php

namespace Niklan\DaData\Tests\Clean;

use Http\Mock\Client;
use Niklan\DaData\Auth;
use Niklan\DaData\DaDataClient;
use Niklan\DaData\Request\Cleaner\EmailCleaner;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Provides test for email clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\EmailCleaner
 */
final class EmailCleanerTest extends TestCase {

  /**
   * Tests sending request.
   *
   * @covers ::clean
   */
  public function testRequest(): void {
    $response_body = $this->prophesize(StreamInterface::class);
    $response_body->getContents()->willReturn(file_get_contents(__DIR__ . '/../../fixtures/clean-email-response.json'));

    $default_response = $this->prophesize(ResponseInterface::class);
    $default_response->getStatusCode()->willReturn(200);
    $default_response->getBody()->willReturn($response_body->reveal());

    $dadata_auth = new Auth('dadata-token', 'dadata-secret');
    $http_client = new Client();
    $http_client->addResponse($default_response->reveal());
    $dadata_client = new DaDataClient($http_client, $dadata_auth);
    $address_cleaner = new EmailCleaner($dadata_client);
    $response = $address_cleaner->clean('serega@yandex/ru');
    $this->assertSame(200, $response->getStatusCode());
  }

}
