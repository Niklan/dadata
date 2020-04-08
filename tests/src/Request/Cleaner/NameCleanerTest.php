<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\NameCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for name clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\NameCleaner
 */
final class NameCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public $fixture = __DIR__ . '/../../../fixtures/clean-name-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new NameCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['Срегей владимерович иванов']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('Иванов Сергей Владимирович', $result_set->getResultItems()->first()->getResult());
    }

}
