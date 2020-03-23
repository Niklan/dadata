<?php

namespace Niklan\DaData\Request\Cleaner;

/**
 * Provides email clean request.
 */
final class EmailCleaner extends CleanerRequestBase {

  /**
   * {@inheritdoc}
   */
  protected $endpoint = '/api/v1/clean/email';

  /**
   * Clean provided address.
   *
   * @param string $email
   *   The email address to clean.
   *
   * @return \Psr\Http\Message\ResponseInterface
   * @throws \Http\Client\Exception
   */
  public function clean(string $email) {
    return $this->sendRequest($email);
  }

}
