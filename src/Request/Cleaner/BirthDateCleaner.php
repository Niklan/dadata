<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\BirthDate;

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
