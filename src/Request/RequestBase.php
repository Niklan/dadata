<?php

namespace Niklan\DaData\Request;

use Niklan\DaData\DaDataClient;

/**
 * Provides default implementation for DaData request.
 */
abstract class RequestBase implements RequestInterface {

  /**
   * The base URL for service.
   *
   * @var string
   */
  protected $baseUrl;

  /**
   * The API endpoint with leading slash.
   *
   * @var string
   */
  protected $endpoint;

  /**
   * The DaData client.
   *
   * @var \Niklan\DaData\DaDataClient
   */
  protected $dadataClient;

  public function __construct(DaDataClient $client) {
    $this->dadataClient = $client;
  }

  /**
   * Sends request to API.
   *
   * @param string $body
   *   The request payload.
   *
   * @return \Psr\Http\Message\ResponseInterface
   * @throws \Http\Client\Exception
   */
  protected function sendRequest(string $body) {
    return $this->getDaDataClient()->sendRequest($this->getRequestUri(), $body);
  }

  /**
   * Gets DaData client.
   *
   * @return \Niklan\DaData\DaDataClient
   *   The DaData client.
   */
  protected function getDaDataClient(): DaDataClient {
    return $this->dadataClient;
  }

  /**
   * Gets complete URI for response.
   *
   * @return string
   *   The API endpoint URI.
   */
  protected function getRequestUri(): string {
    return sprintf('%s%s', $this->baseUrl, $this->endpoint);
  }

}
