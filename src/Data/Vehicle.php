<?php

namespace Niklan\DaData\Data;

use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for store vehicle.
 */
final class Vehicle implements DataFactoryInterface, DataInterface
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
     * {@inheritDoc}
     */
    public static function fromData(array $data): DataInterface
    {
        $required_values = ['source', 'result', 'brand', 'model', 'qc'];
        foreach ($required_values as $required_value) {
            if (!in_array($required_value, array_keys($data))) {
                throw new MissingRequiredDataValueException($required_value);
            }
        }

        $instance = new static();
        $instance->setSource($data['source']);
        $instance->setResult($data['result']);
        $instance->setBrand($data['brand']);
        $instance->setModel($data['model']);
        $instance->setQc($data['qc']);

        return $instance;
    }

    /**
     * Sets source value.
     *
     * @param string $source
     *   The source value.
     */
    private function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * Sets result.
     *
     * @param string $result
     *   The formatted vehicle name.
     */
    private function setResult(string $result): void
    {
        $this->result = $result;
    }

    /**
     * Sets vehicle brand.
     *
     * @param string $brand
     *   The formatted vehicle brand.
     */
    private function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * Sets quality code.
     *
     * @param string $qc
     *   The email quality code.
     */
    private function setQc(string $qc): void
    {
        $this->qc = $qc;
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

    /**
     * Sets vehicle model.
     *
     * @param string $model
     *   The formatted model name.
     */
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

}
