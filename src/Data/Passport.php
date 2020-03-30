<?php

namespace Niklan\DaData\Data;

use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for passport information.
 */
final class Passport implements DataInterface, DataFactoryInterface
{

    /**
     * The source value.
     *
     * @var string
     */
    private $source;

    /**
     * The passport series.
     *
     * @var string
     */
    private $series;

    /**
     * The passport number.
     *
     * @var string
     */
    private $number;

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
        $required_values = ['source', 'series', 'number', 'qc'];
        foreach ($required_values as $required_value) {
            if (!in_array($required_value, array_keys($data))) {
                throw new MissingRequiredDataValueException($required_value);
            }
        }

        $instance = new static();
        $instance->setSource($data['source']);
        $instance->setSeries($data['series']);
        $instance->setNumber($data['number']);
        $instance->setQc($data['qc']);
        return $instance;
    }

    /**
     * Sets passport source.
     *
     * @param string $source
     *   The passport source.
     */
    private function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * Sets quality code.
     *
     * @param string $qc
     *   The passport quality code.
     */
    private function setQc(string $qc): void
    {
        $this->qc = $qc;
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
     * Gets source value.
     *
     * @return string
     *   The source passport.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Gets series.
     *
     * @return string
     *   The passport series.
     */
    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * Gets number.
     *
     * @return string
     *   The passport number.
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Sets number.
     *
     * @param string $number
     *   The passport number.
     */
    private function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * Sets series.
     *
     * @param string $series
     *   The passport series.
     */
    private function setSeries(string $series): void
    {
        $this->series = $series;
    }

}
