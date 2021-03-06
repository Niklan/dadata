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
    public $fixture = __DIR__ . '/../../../fixtures/clean-phone-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new PhoneCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['раб 846)231.60.14 *139']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('раб 846)231.60.14 *139', $result_set->getResultItems()->first()->getSource());
    }

}
