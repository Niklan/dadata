<?php

namespace Niklan\DaData\Result\Data;

/**
 * Provides interface for standardized data from DaData responses.
 */
interface DataItemInterface
{

    /**
     * Gets value object type name.
     *
     * @return string
     *   The data type name.
     */
    public function getDataType(): string;

}
