<?php

namespace Niklan\DaData\Result;

use ArrayIterator;
use IteratorAggregate;
use Niklan\DaData\Data\DataFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides result storage.
 */
final class ResultSet implements IteratorAggregate {

  /**
   * The response status code.
   *
   * @var int
   */
  protected $responseStatusCode;

  /**
   * The response reason phrase.
   *
   * @var string
   */
  protected $responseReasonPhrase;

  /**
   * The response body content.
   *
   * @var string
   */
  protected $responseBodyContent;

  /**
   * The result items.
   *
   * @var \Niklan\DaData\Data\DataInterface[]
   */
  protected $resultItems = [];

  /**
   * Creates a ResultSet instance from response.
   *
   * @param \Psr\Http\Message\ResponseInterface $response
   *   The response from API.
   * @param string $data_factory
   *   The data factory class for result values. Must implement
   *   DataFactoryInterface.
   *
   * @return \Niklan\DaData\Result\ResultSet
   *   The instance with results.
   */
  public static function createFromResponse(ResponseInterface $response, string $data_factory): ResultSet {
    assert(is_subclass_of($data_factory, DataFactoryInterface::class));
    $instance = new static();
    $instance->responseStatusCode = $response->getStatusCode();
    $instance->responseReasonPhrase = $response->getReasonPhrase();
    $instance->responseBodyContent = $response->getBody()->getContents();
    $data = json_decode($instance->responseBodyContent, TRUE);
    foreach ($data as $datum) {
      $instance->resultItems[] = $data_factory::fromData($datum);
    }
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getIterator(): ArrayIterator {
    return new ArrayIterator($this->resultItems);
  }

  /**
   * Gets count of results.
   *
   * @return int
   *   The amount of result items.
   */
  public function getResultCount(): int {
    return count($this->resultItems);
  }

  /**
   * Gets result items.
   *
   * @return array
   *   The result items.
   */
  public function getResultItems(): array {
    return $this->resultItems;
  }

  /**
   * Gets response status code.
   *
   * @return int
   *   The HTTP status code.
   */
  public function getResponseStatusCode(): int {
    return $this->responseStatusCode;
  }

  /**
   * Gets response reason phrase.
   *
   * @return string
   *   The HTTP status message.
   */
  public function getResponseReasonPhrase(): string {
    return $this->responseReasonPhrase;
  }

  /**
   * Gets response content.
   *
   * @return string
   *   The raw content of response.
   */
  public function getResponseBodyContent(): string {
    return $this->responseBodyContent;
  }

}
