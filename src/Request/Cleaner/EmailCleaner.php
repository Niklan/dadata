<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\EmailFactory;
use Niklan\DaData\Result\ResultSet;

/**
 * Provides email clean request.
 *
 * @see https://dadata.ru/api/clean/email/
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
   * @return \Niklan\DaData\Result\ResultSet
   * @throws \Http\Client\Exception
   */
  public function clean(string $email) {
    $response = $this->sendRequest($email);
    return ResultSet::createFromResponse($response, new EmailFactory());
  }

}
