<?php

namespace Niklan\DaData\Data;

use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for store birth date.
 */
final class BirthDate implements DataFactoryInterface, DataInterface
{

    /**
     * The source value.
     *
     * @var string
     */
    private $source;

    /**
     * The formatted birth date.
     *
     * @var string
     */
    private $birthDate;

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
        $required_values = ['source', 'birthdate', 'qc'];
        foreach ($required_values as $required_value) {
            if (!in_array($required_value, array_keys($data))) {
                throw new MissingRequiredDataValueException($required_value);
            }
        }

        $instance = new static();
        $instance->setSource($data['source']);
        $instance->setBirthDate($data['birthdate']);
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
     * Sets birth date.
     *
     * @param string $birthDate
     *   The formatted birth date.
     */
    private function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
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
     * Gets birth date.
     *
     * @return string
     *   The formatted birth date.
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
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

}
