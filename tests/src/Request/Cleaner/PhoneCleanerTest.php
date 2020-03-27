<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\PhoneCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for phone clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\PhoneCleaner
 */
final class PhoneCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public static $fixture = __DIR__ . '/../../../fixtures/clean-phone-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $address_cleaner = new PhoneCleaner($this->getDaDataClient());
        $result_set = $address_cleaner->clean(['раб 846)231.60.14 *139']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultCount());
        $items = $result_set->getResultItems();
        $first = array_shift($items);
        $this->assertSame('раб 846)231.60.14 *139', $first->getSource());
    }

}
