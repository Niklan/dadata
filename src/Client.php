<?php

namespace Niklan\DaData;

use Http\Client\HttpClient;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;

/**
 * Provides provider for an API requests.
 */
final class Client {

  /**
   * The HTTP client.
   *
   * @var \Http\Client\HttpClient
   */
  protected $httpClient;

  /**
   * The request factory.
   *
   * @var \Http\Message\RequestFactory
   */
  protected $requestFactory;

  /**
   * The authentication credentials.
   *
   * @var \Niklan\DaData\Auth
   */
  protected $auth;

  /**
   * Constructs a new Client object.
   *
   * @param \Http\Client\HttpClient $client
   *   The HTTP httpClient.
   * @param \Niklan\DaData\Auth $auth
   *   The authentication credentials.
   */
  public function __construct(HttpClient $client, Auth $auth) {
    $this->httpClient = $client;
    $this->requestFactory = MessageFactoryDiscovery::find();
    $this->auth = $auth;
  }

  /**
   * Sends request to dadata.
   *
   * @param string $uri
   * @param string $body
   * @param array $headers
   * @param string $method
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   The response.
   *
   * @throws \Http\Client\Exception
   */
  public function sendRequest(string $uri, string $body, array $headers = [], string $method = 'POST') {
    $headers += [
      'Content-Type' => 'application/json',
    ];
    $message = $this->getRequestFactory()->createRequest($method, $uri, $headers, $body);
    $message = $this->getAuth()->authenticate($message);
    return $this->getHttpClient()->sendRequest($message);
  }

  /**
   * Gets request factory.
   *
   * @return \Http\Message\RequestFactory
   *   The request factory.
   */
  protected function getRequestFactory(): RequestFactory {
    return $this->requestFactory;
  }

  /**
   * Get API credentials.
   *
   * @return \Niklan\DaData\Auth
   *   The API credentials.
   */
  protected function getAuth(): Auth {
    return $this->auth;
  }

  /**
   * Gets HTTP client.
   *
   * @return \Http\Client\HttpClient
   *   The HTTP client adapter.
   */
  protected function getHttpClient(): HttpClient {
    return $this->httpClient;
  }

}
