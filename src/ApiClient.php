<?php

namespace Niklan\Dadata;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Provides provider for an API requests.
 */
final class ApiClient {

  /**
   * The HTTP client.
   *
   * @var \Psr\Http\Client\ClientInterface
   */
  protected $client;

  /**
   * The auth credentials.
   *
   * @var \Niklan\Dadata\Auth
   */
  protected $auth;

  /**
   * Constructs a new ApiClient object.
   *
   * @param \Psr\Http\Client\ClientInterface $client
   *   The HTTP client.
   * @param \Niklan\Dadata\Auth $auth
   *   The auth credentials.
   */
  public function __construct(ClientInterface $client, Auth $auth) {
    $this->client = $client;
    $this->auth = $auth;
  }

  /**
   * Sends request to dadata.
   *
   * @param \Psr\Http\Message\RequestInterface $request
   *   The request.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   The response.
   *
   * @throws \Psr\Http\Client\ClientExceptionInterface
   */
  public function sendRequest(RequestInterface $request) {
    $request = $this->auth->authenticate($request);
    return $this->client->sendRequest($request);
  }

}
