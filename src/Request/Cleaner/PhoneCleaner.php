<?php

namespace Niklan\DaData\Request\Cleaner;

use Http\Client\Exception;
use Niklan\DaData\Data\Phone;
use Niklan\DaData\Result\ResultSet;

/**
 * Provides phone clean request.
 *
 * @see https://dadata.ru/api/clean/phone/
 */
final class PhoneCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/phone';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = Phone::class;

}
