<?php

namespace Niklan\DaData\Data;

use InvalidArgumentException;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Value object for standardized email.
 */
final class Email implements DataInterface
{

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
    private $source;

    /**
     * The cleaned email.
     *
     * @var string
     */
    private $email;

    /**
     * The email local name or username.
     *
     * @var string
     */
    private $local;

    /**
     * The domain of email.
     *
     * @var string
     */
    private $domain;

    /**
     * The address type.
     *
     * @var string
     */
    private $type;

    /**
     * The quality code.
     *
     * @var string
     */
    private $qc;

    /**
     * Constructs a new Email object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        foreach (['source', 'email', 'local', 'domain', 'type', 'qc'] as $required_property) {
            if (!isset($data[$required_property])) {
                throw new MissingRequiredDataValueException($required_property);
            }
        }

        $allowed_types = [
            self::TYPE_CORPORATE,
            self::TYPE_PERSONAL,
            self::TYPE_DISPOSABLE,
            self::TYPE_ROLE,
        ];

        if (!in_array($data['type'], $allowed_types)) {
            throw new InvalidArgumentException(sprintf("The %s email type is not allowed value.", $data['type']));
        }
        $this->type = $data['type'];

        $this->source = $data['source'];
        $this->email = $data['email'];
        $this->local = $data['local'];
        $this->domain = $data['domain'];
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
     * Gets email.
     *
     * @return string
     *   The formatted email.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Gets local name.
     *
     * @return string
     *   The local name of the email.
     */
    public function getLocal(): string
    {
        return $this->local;
    }

    /**
     * Gets domain.
     *
     * @return string
     *   The domain name of the email.
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Gets email type.
     *
     * @return string
     *   The email type.
     */
    public function getType(): string
    {
        return $this->type;
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
