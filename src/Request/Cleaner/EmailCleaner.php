<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\Email;
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
   * @param array $emails
   *   An array with emails to clean.
   *
   * @return \Niklan\DaData\Result\ResultSet
   *   The results.
   *
   * @throws \Http\Client\Exception
   */
  public function clean(array $emails) {
    $response = $this->sendRequest($emails);
    return ResultSet::createFromResponse($response, Email::class);
  }

}
