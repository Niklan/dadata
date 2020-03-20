<?php

namespace Niklan\Dadata\Clean;

use Niklan\Dadata\Cleaner\CleanerRequestBase;
use Niklan\Dadata\RequestBase;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Provides address clean request.
 *
 * @see https://dadata.ru/api/clean/address/
 */
final class AddressCleaner extends CleanerRequestBase {

  protected $endpoint = '/api/v1/clean/address';

}
