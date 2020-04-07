<?php

namespace Niklan\DaData\Data;

use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for store vehicle.
 */
final class Vehicle implements DataInterface
{

    /**
     * The source value.
     *
     * @var string
     */
    private $source;

    /**
     * The formatted vehicle name.
     *
     * @var string
     */
    private $result;

    /**
     * The vehicle brand.
     *
     * @var string
     */
    private $brand;

    /**
     * The vehicle model.
     *
     * @var string
     */
    private $model;

    /**
     * The quality code.
     *
     * @var string
     */
    private $qc;

    /**
     * Constructs a new Vehicle object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        foreach (['source', 'result', 'brand', 'model', 'qc'] as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $this->source = $data['source'];
        $this->result = $data['result'];
        $this->brand = $data['brand'];
        $this->model = $data['model'];
        $this->qc = $data['qc'];
    }

    /**
     * Gets source value.
     *
     * @return string
     *   The source value.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Gets quality code.
     *
     * @return string
     *   The quality code indicator.
     */
    public function getQc(): string
    {
        return $this->qc;
    }

    /**
     * Gets result.
     *
     * @return string
     *   The formatted vehicle name.
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Gets vehicle brand.
     *
     * @return string
     *   The formatted vehicle brand.
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * Gets vehicle model.
     *
     * @return string
     *   The formatted model name.
     */
    public function getModel(): string
    {
        return $this->model;
    }

}
