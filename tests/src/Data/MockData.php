<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\DataFactoryInterface;
use Niklan\DaData\Data\DataInterface;

/**
 * Provides value object for testing thigs which required DataInterface objects which can have different methods.
 */
final class MockData implements DataInterface, DataFactoryInterface
{

    /**
     * The fake content.
     *
     * @var string
     */
    protected $content;

    /**
     * {@inheritDoc}
     */
    public static function fromData(array $data): DataInterface
    {
        $instance = new static();
        $instance->content = $data['content'];
        return $instance;
    }

    /**
     * Gets content value.
     *
     * @return string
     *   The value.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
