<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\Phone;
use Niklan\DaData\Result\ResultSet;

/**
 * Provides phone clean request.
 *
 * @see https://dadata.ru/api/clean/phone/
 */
final class PhoneCleaner extends CleanerRequestBase {

  /**
   * {@inheritdoc}
   */
  protected $endpoint = '/api/v1/clean/phone';

  /**
   * Clean provided phone.
   *
   * @param array $phones
   *   An array with phones to clean.
   *
   * @return \Niklan\DaData\Result\ResultSet
   *   The results.
   *
   * @throws \Http\Client\Exception
   */
  public function clean(array $phones) {
    $response = $this->sendRequest($phones);
    return ResultSet::createFromResponse($response, Phone::class);
  }

}
