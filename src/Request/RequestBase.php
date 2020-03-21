<?php

namespace Niklan\Dadata\Request;

use Niklan\Dadata\DadataClient;

/**
 * Provides default implementation for dadata request.
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
   * @var \Niklan\Dadata\DadataClient
   */
  protected $dadataClient;

  public function __construct(DadataClient $client) {
    $this->dadataClient = $client;
  }

  /**
   * Gets DaData client.
   *
   * @return \Niklan\Dadata\DadataClient
   */
  protected function getDadataClient(): DadataClient {
    return $this->dadataClient;
  }

  protected function getRequestUri(): string {
    return sprintf('%s%s', $this->baseUrl, $this->endpoint);
  }

}
