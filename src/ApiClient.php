<?php

namespace Niklan\Dadata;

use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Message\RequestFactory;
use Psr\Http\Message\RequestInterface;

/**
 * Provides provider for an API requests.
 */
final class ApiClient {

  /**
   * The HTTP client.
   *
   * @var \Http\Client\Common\PluginClient
   */
  protected $httpClient;

  /**
   * The request factory.
   *
   * @var \Http\Message\RequestFactory
   */
  protected $requestFactory;

  /**
   * Constructs a new ApiClient object.
   *
   * @param \Http\Client\HttpClient $client
   *   The HTTP httpClient.
   * @param \Http\Message\RequestFactory $request_factory
   *   The request factory.
   */
  public function __construct(HttpClient $client, RequestFactory $request_factory) {
    $this->httpClient = new PluginClient($client);
    $this->requestFactory = $request_factory;
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
   * @throws \Http\Client\Exception
   */
  public function sendRequestWithAuth(RequestInterface $request) {
//    $request = $auth->authenticate($request);
    $this->requestFactory->createRequest('GET', 'http://google.ru');
    return $this->httpClient->sendRequest($request);
  }

}
