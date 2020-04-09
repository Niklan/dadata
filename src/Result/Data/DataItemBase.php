<?php

namespace Niklan\DaData\Result\Data;

use Exception;

/**
 * Provides default implementation for value object of data.
 */
abstract class DataItemBase implements DataItemInterface
{

    /**
     * The value object data type name.
     *
     * @var string
     */
    protected $dataType;

    /**
     * {@inheritDoc}
     */
    public function getDataType(): string
    {
        if (empty($this->dataType)) {
            throw new Exception('The dataType property is not set.');
        }
        return $this->dataType;
    }

}
