<?php

namespace Niklan\DaData\Request\Cleaner;

/**
 * Provides address clean request.
 *
 * @see https://dadata.ru/api/clean/address/
 */
final class AddressCleaner extends CleanerRequestBase {

  /**
   * {@inheritdoc}
   */
  protected $endpoint = '/api/v1/clean/address';

  /**
   * Clean provided address.
   *
   * @param string $address
   *   The address to clean.
   *
   * @return \Psr\Http\Message\ResponseInterface
   * @throws \Http\Client\Exception
   */
  public function clean(string $address) {
    return $this->sendRequest($address);
  }

}
