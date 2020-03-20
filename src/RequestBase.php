<?php

namespace Niklan\Dadata;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Provides default implementation for dadata request.
 */
abstract class RequestBase implements RequestInterface {

  /**
   * {@inheritdoc}
   */
  public function getProtocolVersion() {
    // TODO: Implement getProtocolVersion() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withProtocolVersion($version) {
    // TODO: Implement withProtocolVersion() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getHeaders() {
    // TODO: Implement getHeaders() method.
  }

  /**
   * {@inheritdoc}
   */
  public function hasHeader($name) {
    // TODO: Implement hasHeader() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getHeader($name) {
    // TODO: Implement getHeader() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getHeaderLine($name) {
    // TODO: Implement getHeaderLine() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withHeader($name, $value) {
    // TODO: Implement withHeader() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withAddedHeader($name, $value) {
    // TODO: Implement withAddedHeader() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withoutHeader($name) {
    // TODO: Implement withoutHeader() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getBody() {
    // TODO: Implement getBody() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withBody(StreamInterface $body) {
    // TODO: Implement withBody() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getRequestTarget() {
    // TODO: Implement getRequestTarget() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withRequestTarget($requestTarget) {
    // TODO: Implement withRequestTarget() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getMethod() {
    // TODO: Implement getMethod() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withMethod($method) {
    // TODO: Implement withMethod() method.
  }

  /**
   * {@inheritdoc}
   */
  public function getUri() {
    // TODO: Implement getUri() method.
  }

  /**
   * {@inheritdoc}
   */
  public function withUri(UriInterface $uri, $preserveHost = FALSE) {
    // TODO: Implement withUri() method.
  }


}
