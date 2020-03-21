<?php

namespace Niklan\Dadata\Request\Cleaner;

/**
 * Provides address clean request.
 *
 * @see https://dadata.ru/api/clean/address/
 */
final class AddressCleaner extends CleanerRequestBase {

  protected $endpoint = '/api/v1/clean/address';

  public function clean(string $address) {
    return $this->sendRequest($address);
  }

}
