<?php

namespace Niklan\DaData\Request\Cleaner;

use Http\Client\Exception;
use Niklan\DaData\Request\RequestBase;
use Niklan\DaData\Result\ResultSet;

/**
 * Provides abstract implementation for clean request.
 */
abstract class CleanerRequestBase extends RequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $baseUrl = 'https://cleaner.dadata.ru';

    /**
     * The class name of value object for result data.
     *
     * @var string
     */
    protected $dataClass;

    /**
     * Clean provided values.
     *
     * @param array $values
     *   An array with values clean.
     *
     * @return ResultSet
     *   The results.
     *
     * @throws Exception
     */
    public function clean(array $values): ResultSet
    {
        $response = $this->sendRequest($values);
        return ResultSet::createFromResponse($response, $this->dataClass);
    }

}
