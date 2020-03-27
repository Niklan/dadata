<?php

namespace Niklan\DaData;

use Http\Client\Exception;
use Http\Client\HttpClient;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\RequestFactory;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides provider for an API requests.
 */
final class Client
{

    /**
     * The HTTP client.
     *
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * The request factory.
     *
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * The authentication credentials.
     *
     * @var Auth
     */
    protected $auth;

    /**
     * Constructs a new Client object.
     *
     * @param HttpClient $client
     *   The HTTP httpClient.
     * @param Auth $auth
     *   The authentication credentials.
     */
    public function __construct(HttpClient $client, Auth $auth)
    {
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
     * @return ResponseInterface
     *   The response.
     *
     * @throws Exception
     */
    public function sendRequest(string $uri, string $body, array $headers = [], string $method = 'POST')
    {
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
     * @return RequestFactory
     *   The request factory.
     */
    protected function getRequestFactory(): RequestFactory
    {
        return $this->requestFactory;
    }

    /**
     * Get API credentials.
     *
     * @return Auth
     *   The API credentials.
     */
    protected function getAuth(): Auth
    {
        return $this->auth;
    }

    /**
     * Gets HTTP client.
     *
     * @return HttpClient
     *   The HTTP client adapter.
     */
    protected function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

}
