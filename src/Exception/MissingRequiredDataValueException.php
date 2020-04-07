<?php

namespace Niklan\DaData\Exception;

use Exception;

/**
 * Provides exception for missing required data value.
 */
final class MissingRequiredDataValueException extends \InvalidArgumentException
{

    /**
     * Constructs a new MissingRequiredDataValueException object.
     *
     * @param string $missing_value
     *   The missing value name.
     */
    public function __construct(string $missing_value)
    {
        $message = sprintf("Missing required property %s.", $missing_value);
        parent::__construct($message);
    }

}
