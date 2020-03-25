<?php

namespace Niklan\DaData\Data;

use InvalidArgumentException;

/**
 * Provides value object for standardized email.
 */
final class Phone implements DataInterface, DataFactoryInterface {

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
  protected $source;

  /**
   * The phone type.
   *
   * @var string
   */
  protected $type;

  /**
   * The standardized phone number.
   *
   * @var string
   */
  protected $phone;

  /**
   * {@inheritdoc}
   */
  public static function fromData(array $data): DataInterface {
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
        throw new InvalidArgumentException(sprintf("The %s is missing", $required_values));
      }
    }

    $instance = new static();
    $instance->setSource($data['source']);
    $instance->setType($data['type']);
    $instance->setPhone($data['phone']);
    return $instance;
  }

  /**
   * Gets source value.
   *
   * @return string
   *   The source email.
   */
  public function getSource(): string {
    return $this->source;
  }

  /**
   * Sets source value.
   *
   * @param string $source
   *   The source value.
   */
  protected function setSource(string $source): void {
    $this->source = $source;
  }

  /**
   * Gets phone type.
   *
   * @return string
   *   The phone type.
   */
  public function getType(): string {
    return $this->type;
  }

  /**
   * Sets phone type.
   *
   * @param string $type
   *   The phone type.
   */
  protected function setType(string $type): void {
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
  public function getPhone(): string {
    return $this->phone;
  }

  /**
   * Sets phone number.
   *
   * @param string $phone
   *   The standardized phone number.
   */
  protected function setPhone(string $phone): void {
    $this->phone = $phone;
  }

}
