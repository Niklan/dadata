<?php

namespace Niklan\DaData\Data;

/**
 * Provides interface for data factory.
 */
interface DataFactoryInterface
{

    /**
     * Creates object with standardized data from raw values.
     *
     * @param array $data
     *   The raw data value.
     *
     * @return DataInterface
     *   The standardized value object.
     */
    public static function fromData(array $data): DataInterface;

}
