<?php

namespace Niklan\DaData\Tests\Request;

use Http\Client\HttpClient;
use Http\Mock\Client as MockHttpClient;
use Niklan\DaData\Auth;
use Niklan\DaData\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Provides default implementation for test based on response from fixtures.
 */
abstract class FixtureResponseTestCase extends TestCase {

  /**
   * The path to fixture response content.
   *
   * @var string
   */
  public static $fixture;

  /**
   * The auth credentials for an API.
   *
   * @var \Niklan\DaData\Auth
   */
  protected $daDataAuth;

  /**
   * The HTTP client.
   *
   * @var \Http\Client\HttpClient
   */
  protected $httpClient;

  /**
   * The API client.
   *
   * @var \Niklan\DaData\Client
   */
  protected $daDataClient;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();
    $this->daDataAuth = new Auth('dadata-token', 'dadata-secret');
    $this->httpClient = new MockHttpClient();
    $fixture_content = file_get_contents(static::$fixture);
    $response = $this->prophesizeResponse(200, 'Success.', $fixture_content);
    $this->httpClient->setDefaultResponse($response);
    $this->daDataClient = new Client($this->getHttpClient(), $this->getDaDataAuth());
  }

  /**
   * Creates mock for response.
   *
   * @param int $status_code
   *   The HTTP status code for response.
   * @param string $reason_phrase
   *   The HTTP status message.
   * @param string $body_content
   *   The response body content.
   *
   * @return \Psr\Http\Message\ResponseInterface
   */
  protected function prophesizeResponse(int $status_code, string $reason_phrase, string $body_content): ResponseInterface {
    $body = $this->prophesize(StreamInterface::class);
    $body->getContents()->willReturn($body_content);

    $response = $this->prophesize(ResponseInterface::class);
    $response->getStatusCode()->willReturn($status_code);
    $response->getBody()->willReturn($body->reveal());
    $response->getReasonPhrase()->willReturn($reason_phrase);

    return $response->reveal();
  }

  /**
   * Gets DaData auth credentials.
   *
   * @return \Niklan\DaData\Auth
   *   The auth credentials.
   */
  public function getDaDataAuth(): Auth {
    return $this->daDataAuth;
  }

  /**
   * Gets HTTP client.
   *
   * @return \Http\Client\HttpClient
   *   The HTTP client.
   */
  public function getHttpClient(): HttpClient {
    return $this->httpClient;
  }

  /**
   * Gets DaData API client.
   *
   * @return \Niklan\DaData\Client
   *   The API client.
   */
  public function getDaDataClient(): Client {
    return $this->daDataClient;
  }

}
