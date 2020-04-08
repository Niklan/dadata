<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\Passport;

/**
 * Provides passport clean request.
 *
 * @see https://dadata.ru/api/clean/passport/
 */
final class PassportCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/passport';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = Passport::class;

}
