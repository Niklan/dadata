<?php

namespace Niklan\DaData\Data;

use InvalidArgumentException;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Provides value object for standardized email.
 */
final class Phone implements DataInterface, DataFactoryInterface
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
     * {@inheritdoc}
     */
    public static function fromData(array $data): DataInterface
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
        foreach ($required_values as $required_value) {
            if (!in_array($required_value, array_keys($data))) {
                throw new MissingRequiredDataValueException($required_value);
            }
        }

        $instance = new static();
        $instance->setSource($data['source']);
        $instance->setType($data['type']);
        $instance->setPhone($data['phone']);
        $instance->setCountryCode($data['country_code']);
        $instance->setCityCode($data['city_code']);
        $instance->setNumber($data['number']);
        $instance->setExtension($data['extension']);
        $instance->setProvider($data['provider']);
        $instance->setCountry($data['country']);
        $instance->setRegion($data['region']);
        $instance->setCity($data['city']);
        $instance->setTimezone($data['timezone']);
        $instance->setQcConflict($data['qc_conflict']);
        $instance->setQc($data['qc']);

        return $instance;
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
     * Sets phone type.
     *
     * @param string $type
     *   The phone type.
     */
    private function setType(string $type): void
    {
        $allowed_values = [
            self::TYPE_MOBILE,
            self::TYPE_STATIONARY,
            self::TYPE_DIRECT_MOBILE,
            self::TYPE_CALL_CENTER,
            self::TYPE_UNKNOWN,
        ];
        if (!in_array($type, $allowed_values)) {
            throw new InvalidArgumentException(sprintf('The %s is not allowed phone type.', $type));
        }

        $this->type = $type;
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
     * Sets phone number.
     *
     * @param string $phone
     *   The standardized phone number.
     */
    private function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
     * Sets country code.
     *
     * @param int $countryCode
     *   The country code for phone number.
     */
    private function setCountryCode(int $countryCode): void
    {
        $this->countryCode = $countryCode;
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
     * Sets city code.
     *
     * @param int $cityCode
     *   The city code for phone number.
     */
    public function setCityCode(int $cityCode): void
    {
        $this->cityCode = $cityCode;
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
     * Sets phone number.
     *
     * @param int $number
     *   The phone number.
     */
    private function setNumber(int $number): void
    {
        $this->number = $number;
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
     * Sets extension number.
     *
     * @param int $extension
     *   The phone extension.
     */
    private function setExtension(int $extension): void
    {
        $this->extension = $extension;
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
     * Sets provider.
     *
     * @param string $provider
     *   The mobile operator name.
     */
    private function setProvider(string $provider): void
    {
        $this->provider = $provider;
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
     * Sets phone country name.
     *
     * @param string $country
     *   The country name.
     */
    private function setCountry(string $country): void
    {
        $this->country = $country;
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
     * Sets phone region name.
     *
     * @param string $region
     *   The region name.
     */
    private function setRegion(string $region): void
    {
        $this->region = $region;
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
     * Sets phone city assigment.
     *
     * @param string $city
     *   The city name.
     */
    private function setCity(string $city): void
    {
        $this->city = $city;
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
     * Sets phone city or country timezone.
     *
     * @param string $timezone
     *   The UTC timezone.
     */
    private function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
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
     * Sets phone quality code conflict.
     *
     * @param int $qcConflict
     *   The quality code.
     */
    private function setQcConflict(int $qcConflict): void
    {
        $this->qcConflict = $qcConflict;
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

    /**
     * Sets phone quality code.
     *
     * @param int $qc
     *   The quality code.
     */
    public function setQc(int $qc): void
    {
        $this->qc = $qc;
    }

}
