<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Result\Data\Cleaner\Phone;

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
