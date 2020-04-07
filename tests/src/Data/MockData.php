<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\DataInterface;

/**
 * Provides value object for testing this which required DataInterface objects which can have different methods.
 */
final class MockData implements DataInterface
{

    /**
     * The fake content.
     *
     * @var string
     */
    protected $content;

    /**
     * Constructs a new MockData object.
     *
     * @param array $data
     *   The data to store.
     */
    public function __construct(array $data)
    {
        $this->content = $data['content'];
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
