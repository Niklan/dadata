<?php

namespace Niklan\DaData\Data;

use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for passport information.
 */
final class Passport implements DataInterface
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
     * Constructs a new Passport object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        foreach (['source', 'series', 'number', 'qc'] as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $this->source = $data['source'];
        $this->series = $data['series'];
        $this->number = $data['number'];
        $this->qc = $data['qc'];
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

}
