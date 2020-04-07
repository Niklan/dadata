<?php

namespace Niklan\DaData\Data;

use InvalidArgumentException;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for standardized email.
 */
final class Phone implements DataInterface
{

    /**
     * Represents the 'Мобильный' phone type.
     *
     * This type is reference for mobile phone number.
     *
     * Example: '+7 911 243-45-68'.
     *
     * @var string
     */
    public const TYPE_MOBILE = 'Мобильный';

    /**
     * Represents the 'Стационарный' phone type.
     *
     * This type is reference for stationary phone number.
     *
     * Example: '+7 495 456-55-77'.
     *
     * @var string
     */
    public const TYPE_STATIONARY = 'Стационарный';

    /**
     * Represents the 'Прямой мобильный' phone type.
     *
     * This type is reference for direct mobile phone number.
     *
     * Example: '+7 495 243-45-68'.
     *
     * @var string
     */
    public const TYPE_DIRECT_MOBILE = 'Прямой мобильный';

    /**
     * Represents the 'Колл-центр' phone type.
     *
     * This type is reference for call center phone number.
     *
     * Example: '8 800 222-12-22'.
     *
     * @var string
     */
    public const TYPE_CALL_CENTER = 'Колл-центр';

    /**
     * Represents the 'Неизвестный' phone type.
     *
     * This type is reference for phone number which cannot be parsed.
     *
     * Example: '+7 333 1111112'.
     *
     * @var string
     */
    public const TYPE_UNKNOWN = 'Неизвестный';

    /**
     * The source value.
     *
     * @var string
     */
    private $source;

    /**
     * The phone type.
     *
     * @var string
     */
    private $type;

    /**
     * The standardized phone number.
     *
     * @var string
     */
    private $phone;

    /**
     * The phone country code.
     *
     * @var int
     */
    private $countryCode;

    /**
     * The phone city code.
     *
     * @var int
     */
    private $cityCode;

    /**
     * The phone number.
     *
     * @var int
     */
    private $number;

    /**
     * The extension number.
     *
     * @var int
     */
    private $extension;

    /**
     * The mobile operator.
     *
     * @var string
     */
    private $provider;

    /**
     * The country name.
     *
     * @var string
     */
    private $country;

    /**
     * The region name.
     *
     * @var string
     */
    private $region;

    /**
     * The city name.
     *
     * @var string
     */
    private $city;

    /**
     * The city timezone.
     *
     * The timezone for city if phone number is Russian, the country timezone if
     * phone is foreign. If country has multiple timezones value will be minimum
     * and maximum separated by '/'. E.g.: 'UTC+5/UTC+6'.
     *
     * @var string
     */
    private $timezone;

    /**
     * The quality code conflict with address.
     *
     * @var int
     */
    private $qcConflict;

    /**
     * The quality code.
     *
     * @var int
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
        $required_values = [
            'source',
            'type',
            'phone',
            'country_code',
            'city_code',
            'number',
            'extension',
            'provider',
            'country',
            'region',
            'city',
            'timezone',
            'qc_conflict',
            'qc',
        ];
        foreach ($required_values as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $allowed_values = [
            self::TYPE_MOBILE,
            self::TYPE_STATIONARY,
            self::TYPE_DIRECT_MOBILE,
            self::TYPE_CALL_CENTER,
            self::TYPE_UNKNOWN,
        ];
        if (!in_array($data['type'], $allowed_values)) {
            throw new InvalidArgumentException(sprintf('The %s is not allowed phone type.', $data['type']));
        }
        $this->type = $data['type'];

        $this->source = $data['source'];
        $this->phone = $data['phone'];
        $this->countryCode = $data['country_code'];
        $this->cityCode = $data['city_code'];
        $this->number = $data['number'];
        $this->extension = $data['extension'];
        $this->number = $data['number'];
        $this->provider = $data['provider'];
        $this->country = $data['country'];
        $this->region = $data['region'];
        $this->city = $data['city'];
        $this->timezone = $data['timezone'];
        $this->qcConflict = $data['qc_conflict'];
        $this->qc = $data['qc'];
    }

    /**
     * Gets source value.
     *
     * @return string
     *   The source email.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Gets phone type.
     *
     * @return string
     *   The phone type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Gets phone number.
     *
     * @return string
     *   The standardized phone number.
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Get country code.
     *
     * @return int
     *   The country code for phone number.
     */
    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    /**
     * Get city code.
     *
     * @return int
     *   The city code for phone number.
     */
    public function getCityCode(): int
    {
        return $this->cityCode;
    }

    /**
     * Gets phone number.
     *
     * @return int
     *   The phone number.
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Gets extension number.
     *
     * @return int
     *   The phone extension.
     */
    public function getExtension(): int
    {
        return $this->extension;
    }

    /**
     * Gets provider.
     *
     * @return string
     *   The mobile operator name.
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * Gets phone country name.
     *
     * @return string
     *   The country name.
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Gets phone region name.
     *
     * @return string
     *   The region name.
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Gets phone city assigment.
     *
     * @return string
     *   The city name.
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Gets phone city or country timezone.
     *
     * @return string
     *   The UTC timezone.
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * Gets phone quality code conflict.
     *
     * @return int
     *   The quality code.
     */
    public function getQcConflict(): int
    {
        return $this->qcConflict;
    }

    /**
     * Gets phone quality code.
     *
     * @return int
     *   The quality code.
     */
    public function getQc(): int
    {
        return $this->qc;
    }

}
