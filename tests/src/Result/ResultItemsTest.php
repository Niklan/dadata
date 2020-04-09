<?php

namespace Niklan\DaData\Tests\Result;

use Niklan\DaData\Result\Data\DataItemInterface;
use Niklan\DaData\Result\ResultItems;
use Niklan\DaData\Tests\Result\Data\MockDataItem;
use PHPUnit\Framework\TestCase;

/**
 * Provides test for result items collection.
 *
 * @coversDefaultClass \Niklan\DaData\Result\ResultItems
 */
final class ResultItemsTest extends TestCase
{

    /**
     * Tests object.
     *
     * @covers ::add
     * @covers ::count
     * @covers ::first
     * @covers ::get
     * @covers ::getIterator
     */
    public function testItems(): void
    {
        $result_items = new ResultItems();
        $result_items->add($this->createMockData('First.'));
        $result_items->add($this->createMockData('Second.'));
        $result_items->add($this->createMockData('Third.'));
        $this->assertSame(3, $result_items->count());
        $this->assertSame('First.', $result_items->first()->getContent());
        $this->assertSame('Third.', $result_items->get(2)->getContent());
        $values = [];
        foreach ($result_items as $item) {
            $values[] = $item->getContent();
        }
        $this->assertSame(['First.', 'Second.', 'Third.'], $values);
    }

    /**
     * Create fake data object.
     *
     * @param string $content
     *   The content for ->getContent() method call.
     *
     * @return DataItemInterface
     *   The data mocked object.
     */
    protected function createMockData(string $content): DataItemInterface
    {
        return new MockDataItem(['content' => $content]);
    }

}
