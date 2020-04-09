<?php

namespace Niklan\DaData\Result\Data\Cleaner;

use Niklan\DaData\Exception\MissingRequiredDataValueException;
use Niklan\DaData\Result\Data\DataItemBase;

/**
 * Value object for store birth date.
 */
final class BirthDate extends DataItemBase
{

    /**
     * {@inheritDoc}
     */
    protected $dataType = 'cleaner_birth_date';

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
     * Constructs a new BirthDate object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        foreach (['source', 'birthdate', 'qc'] as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $this->source = $data['source'];
        $this->birthDate = $data['birthdate'];
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
