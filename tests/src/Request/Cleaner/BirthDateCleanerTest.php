<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\BirthDateCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for birth date clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\BirthDateCleaner
 */
final class BirthDateCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public $fixture = __DIR__ . '/../../../fixtures/clean-birthdate-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new BirthDateCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['24/3/12']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('24.03.2012', $result_set->getResultItems()->first()->getBirthDate());
    }

}
