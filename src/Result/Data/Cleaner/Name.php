<?php

namespace Niklan\DaData\Result\Data\Cleaner;

use InvalidArgumentException;
use Niklan\DaData\Exception\MissingRequiredDataValueException;
use Niklan\DaData\Result\Data\DataItemBase;

/**
 * Value object for name.
 */
final class Name extends DataItemBase
{

    /**
     * Represents 'male' gender.
     */
    public const GENDER_MALE = 'М';

    /**
     * Represents 'female' gender.
     */
    public const GENDER_FEMALE = 'Ж';

    /**
     * Represents 'undefined' gender.
     */
    public const GENDER_UNDEFINED = 'НД';

    /**
     * The source value.
     *
     * @var mixed
     */
    private $source;

    /**
     * The processed result.
     * @var mixed
     */
    private $result;

    /**
     * The name in genitive form.
     *
     * @var mixed
     */
    private $genitive;

    /**
     * The name in dative form.
     *
     * @var mixed
     */
    private $dative;

    /**
     * The name in ablative form.
     *
     * @var mixed
     */
    private $ablative;

    /**
     * The surname.
     *
     * @var mixed
     */
    private $surname;

    /**
     * The name.
     *
     * @var mixed
     */
    private $name;

    /**
     * The patronymic.
     *
     * @var mixed
     */
    private $patronymic;

    /**
     * The name gender.
     *
     * @var mixed
     */
    private $gender;

    /**
     * The quality code.
     *
     * @var mixed
     */
    private $qc;

    /**
     * Constructs a new Name object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        $required_properties = [
            'source',
            'result',
            'result_genitive',
            'result_dative',
            'result_ablative',
            'surname',
            'name',
            'patronymic',
            'gender',
            'qc'
        ];
        foreach ($required_properties as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $allowed_genders = [self::GENDER_FEMALE, self::GENDER_MALE, self::GENDER_UNDEFINED];
        if (!in_array($data['gender'], $allowed_genders)) {
            throw new InvalidArgumentException(sprintf("The %s gender type is not allowed value.", $data['gender']));
        }
        $this->gender = $data['gender'];

        $this->source = $data['source'];
        $this->result = $data['result'];
        $this->genitive = $data['result_genitive'];
        $this->dative = $data['result_dative'];
        $this->ablative = $data['result_ablative'];
        $this->surname = $data['surname'];
        $this->name = $data['name'];
        $this->patronymic = $data['patronymic'];
        $this->qc = $data['qc'];
    }

    /**
     * Gets source value.
     *
     * @return string
     *   The source name.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Gets result value.
     *
     * @return string
     *  The formatted name.
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Gets genitive name.
     *
     * @return string
     *   The name in genitive form.
     */
    public function getGenitive(): string
    {
        return $this->genitive;
    }

    /**
     * Gets dative name.
     *
     * @return string
     *   The name in dative form.
     */
    public function getDative(): string
    {
        return $this->dative;
    }

    /**
     * Gets ablative name.
     *
     * @return string
     *   The name in ablative form.
     */
    public function getAblative(): string
    {
        return $this->ablative;
    }

    /**
     * Gets surname.
     *
     * @return string
     *   The surname.
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * Gets name.
     *
     * @return string
     *   The name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets patronymic.
     *
     * @return string
     *   The patronymic.
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * Gets gender.
     *
     * @return string
     *   The gender.
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Gets quality code.
     *
     * @return string
     *   The quality code.
     */
    public function getQc(): string
    {
        return $this->qc;
    }

}
