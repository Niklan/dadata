<?php

namespace Niklan\DaData\Result;

use Niklan\DaData\Data\DataInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides result storage.
 */
final class ResultSet
{

    /**
     * The response status code.
     *
     * @var int
     */
    private $responseStatusCode;

    /**
     * The response reason phrase.
     *
     * @var string
     */
    private $responseReasonPhrase;

    /**
     * The response body content.
     *
     * @var string
     */
    private $responseBodyContent;

    /**
     * The result items.
     *
     * @var ResultItems
     */
    private $resultItems = [];

    /**
     * Creates a ResultSet instance from response.
     *
     * @param ResponseInterface $response
     *   The response from API.
     * @param string $value_object_class
     *   The value object class for result values.
     *
     * @return ResultSet
     *   The instance with results.
     */
    public static function createFromResponse(ResponseInterface $response, string $value_object_class): ResultSet
    {
        assert(is_subclass_of($value_object_class, DataInterface::class));
        $instance = new static();
        $instance->responseStatusCode = $response->getStatusCode();
        $instance->responseReasonPhrase = $response->getReasonPhrase();
        $instance->responseBodyContent = $response->getBody()->getContents();
        $data = json_decode($instance->responseBodyContent, true);
        $instance->resultItems = new ResultItems();
        foreach ($data as $datum) {
            $instance->resultItems->add(new $value_object_class($datum));
        }
        return $instance;
    }

    /**
     * Gets result items.
     *
     * @return ResultItems
     *   The result items.
     */
    public function getResultItems(): ResultItems
    {
        return $this->resultItems;
    }

    /**
     * Gets response status code.
     *
     * @return int
     *   The HTTP status code.
     */
    public function getResponseStatusCode(): int
    {
        return $this->responseStatusCode;
    }

    /**
     * Gets response reason phrase.
     *
     * @return string
     *   The HTTP status message.
     */
    public function getResponseReasonPhrase(): string
    {
        return $this->responseReasonPhrase;
    }

    /**
     * Gets response content.
     *
     * @return string
     *   The raw content of response.
     */
    public function getResponseBodyContent(): string
    {
        return $this->responseBodyContent;
    }

}
