<?php

namespace Niklan\DaData\Result;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Niklan\DaData\Data\DataInterface;

/**
 * Value object for store and iterate thought result items.
 */
final class ResultItems implements IteratorAggregate, Countable
{

    /**
     * The data items.
     *
     * @var DataInterface[]
     */
    private $items = [];

    /**
     * {@inheritdoc}
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Returns first value from the list.
     *
     * @return DataInterface|null
     *   The data value object. NULL if there is no items.
     */
    public function first(): ?DataInterface
    {
        return $this->get(0);
    }

    /**
     * Returns the item at the specified position in the list.
     *
     * @param int $index
     *   Index of the item to return.
     *
     * @return DataInterface|null
     *   The item at the specified position, or NULL if no items exists at that position.
     */
    public function get(int $index): ?DataInterface
    {
        if (!is_numeric($index)) {
            throw new InvalidArgumentException('Unable to get a value with non-numeric delta in a list.');
        }

        return isset($this->items[$index]) ? $this->items[$index] : null;
    }

    /**
     * Adds specified data in the list.
     *
     * @param DataInterface $data
     *   The item element.
     *
     * @return $this
     */
    public function add(DataInterface $data): ResultItems
    {
        $this->items[] = $data;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->items);
    }
}
