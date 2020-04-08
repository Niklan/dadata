<?php

namespace Niklan\DaData\Request\Cleaner;

use Niklan\DaData\Data\Vehicle;

/**
 * Provides vehicle clean request.
 *
 * @see https://dadata.ru/api/clean/vehicle/
 */
final class VehicleCleaner extends CleanerRequestBase
{

    /**
     * {@inheritdoc}
     */
    protected $endpoint = '/api/v1/clean/vehicle';

    /**
     * {@inheritdoc}
     */
    protected $dataClass = Vehicle::class;

}
