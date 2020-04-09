<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Result\Data\Cleaner\BirthDate;

/**
 * Provides birth date clean request.
 *
 * @see https://dadata.ru/api/clean/birthdate/
 */
final class BirthDateCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/birthdate';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = BirthDate::class;

}
