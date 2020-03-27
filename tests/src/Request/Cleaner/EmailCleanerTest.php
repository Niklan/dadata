<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\EmailCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for email clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\EmailCleaner
 */
final class EmailCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public static $fixture = __DIR__ . '/../../../fixtures/clean-email-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $address_cleaner = new EmailCleaner($this->getDaDataClient());
        $result_set = $address_cleaner->clean(['serega@yandex/ru']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultCount());
        $items = $result_set->getResultItems();
        $first = array_shift($items);
        $this->assertSame('serega@yandex/ru', $first->getSource());
    }

}
