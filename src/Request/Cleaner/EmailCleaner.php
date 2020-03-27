<?php

namespace Niklan\DaData\Request\Cleaner;

use Http\Client\Exception;
use Niklan\DaData\Data\Email;
use Niklan\DaData\Result\ResultSet;

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
     * Clean provided address.
     *
     * @param array $emails
     *   An array with emails to clean.
     *
     * @return ResultSet
     *   The results.
     *
     * @throws Exception
     */
    public function clean(array $emails)
    {
        $response = $this->sendRequest($emails);
        return ResultSet::createFromResponse($response, Email::class);
    }

}
