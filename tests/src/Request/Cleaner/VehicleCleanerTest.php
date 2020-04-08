<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\NameCleaner;
use Niklan\DaData\Request\Cleaner\VehicleCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for vehicle clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\VehicleCleaner
 */
final class VehicleCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public $fixture = __DIR__ . '/../../../fixtures/clean-vehicle-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new VehicleCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['форд фокус']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('FORD FOCUS', $result_set->getResultItems()->first()->getResult());
    }

}
