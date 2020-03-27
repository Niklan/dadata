<?php

namespace Niklan\DaData\Request;

use Http\Client\Exception;
use Niklan\DaData\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides default implementation for DaData request.
 */
abstract class RequestBase implements RequestInterface
{

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
     * @var Client
     */
    protected $dadataClient;

    public function __construct(Client $client)
    {
        $this->dadataClient = $client;
    }

    /**
     * Sends request to API.
     *
     * @param array $payload
     *   The request payload.
     *
     * @return ResponseInterface
     * @throws Exception
     */
    protected function sendRequest(array $payload)
    {
        $json = json_encode($payload);
        return $this->getDaDataClient()->sendRequest($this->getRequestUri(), $json);
    }

    /**
     * Gets DaData client.
     *
     * @return Client
     *   The DaData client.
     */
    protected function getDaDataClient(): Client
    {
        return $this->dadataClient;
    }

    /**
     * Gets complete URI for response.
     *
     * @return string
     *   The API endpoint URI.
     */
    protected function getRequestUri(): string
    {
        return sprintf('%s%s', $this->baseUrl, $this->endpoint);
    }

}
