<?php

namespace Niklan\Dadata;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Provides default implementation for dadata request.
 */
abstract class RequestBase {

 protected $baseUrl;

 protected $endpoint;

 public function getUri(): string {
   return sprintf('%s%s', $this->baseUrl, $this->endpoint);
 }

}
