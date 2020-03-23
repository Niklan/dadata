<?php

namespace Niklan\DaData\Data;

use InvalidArgumentException;

/**
 * Provides value object for standardized email.
 */
final class Email {

  /**
   * Represents the 'PERSONAL' email type.
   *
   * This type is reference for emails with common email services '@mail.ru',
   * '@yandex.ru', '@gmail.com'.
   *
   * @var string
   */
  public const TYPE_PERSONAL = 'PERSONAL';

  /**
   * Represents the 'CORPORATE' email type.
   *
   * This type is reference for corporate emails with custom domains
   * '@myshop.ru'.
   */
  public const TYPE_CORPORATE = 'CORPORATE';

  /**
   * Represents the 'ROLE' email type.
   *
   * This type is reference for specific mail such as 'info@', 'support@'.
   */
  public const TYPE_ROLE = 'ROLE';

  /**
   * Represents the 'DISPOSABLE' email type.
   *
   * This type is reference for one-time or time-based emails '@temp-mail.ru'.
   */
  public const TYPE_DISPOSABLE = 'DISPOSABLE';

  /**
   * The source value.
   *
   * @var string
   */
  protected $source;

  /**
   * The cleaned email.
   *
   * @var string
   */
  protected $email;

  /**
   * The email local name or username.
   *
   * @var string
   */
  protected $local;

  /**
   * The domain of email.
   *
   * @var string
   */
  protected $domain;

  /**
   * The address type.
   *
   * @var string
   */
  protected $type;

  /**
   * The quality code.
   *
   * @var string
   */
  protected $qc;

  /**
   * Constructs a new Email object.
   *
   * @param array $data
   *   The value from DaData response.
   */
  public function __construct(array $data) {
    $required_values = ['source', 'email', 'local', 'domain', 'type', 'qc'];
    foreach ($required_values as $required_value) {
      if (!in_array($required_value, array_keys($data))) {
        throw new InvalidArgumentException(sprintf("The %s is missing", $required_values));
      }
    }

    $this->setSource($data['source']);
    $this->setEmail($data['email']);
    $this->setLocal($data['local']);
    $this->setDomain($data['domain']);
    $this->setType($data['type']);
    $this->setQc($data['qc']);
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
   * Sets email source.
   *
   * @param string $source
   *   The email source.
   */
  protected function setSource(string $source): void {
    $this->source = $source;
  }

  /**
   * Gets email.
   *
   * @return string
   *   The formatted email.
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * Sets email.
   *
   * @param string $email
   *   The formatted email address.
   */
  protected function setEmail(string $email): void {
    $this->email = $email;
  }

  /**
   * Gets local name.
   *
   * @return string
   *   The local name of the email.
   */
  public function getLocal(): string {
    return $this->local;
  }

  /**
   * Sets local email name.
   *
   * @param string $local
   *   The email local name.
   */
  protected function setLocal(string $local): void {
    $this->local = $local;
  }

  /**
   * Gets domain.
   *
   * @return string
   *   The domain name of the email.
   */
  public function getDomain(): string {
    return $this->domain;
  }

  /**
   * Sets email domain.
   *
   * @param string $domain
   *   The email domain.
   */
  protected function setDomain(string $domain): void {
    $this->domain = $domain;
  }

  /**
   * Gets email type.
   *
   * @return string
   *   The email type.
   */
  public function getType(): string {
    return $this->type;
  }

  /**
   * Sets email type.
   *
   * @param string $type
   *   The email type.
   */
  public function setType(string $type): void {
    $allowed_types = [
      self::TYPE_CORPORATE,
      self::TYPE_PERSONAL,
      self::TYPE_DISPOSABLE,
      self::TYPE_ROLE,
    ];

    if (!in_array($type, $allowed_types)) {
      throw new InvalidArgumentException(sprintf("The %s email type is not allowed value."));
    }

    $this->type = $type;
  }

  /**
   * Gets quality code.
   *
   * @return string
   *   The quality code indicator.
   */
  public function getQc(): string {
    return $this->qc;
  }

  /**
   * Sets quality code.
   *
   * @param string $qc
   *   The email quality code.
   */
  protected function setQc(string $qc): void {
    $this->qc = $qc;
  }

}
