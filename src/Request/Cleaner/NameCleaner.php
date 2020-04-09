<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Result\Data\Cleaner\Name;

/**
 * Provides name clean request.
 *
 * @see https://dadata.ru/api/clean/name/
 */
final class NameCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/name';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = Name::class;

}
