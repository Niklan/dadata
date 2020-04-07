<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\Email;

/**
 * Provides email clean request.
 *
 * @see https://dadata.ru/api/clean/email/
 */
final class EmailCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/email';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = Email::class;

}
