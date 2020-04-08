<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\NameCleaner;
use Niklan\DaData\Request\Cleaner\PassportCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for passport clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\PassportCleaner
 */
final class PassportCleanerTest extends FixtureResponseTestCase
{

    /**
     * {@inheritdoc}
     */
    public $fixture = __DIR__ . '/../../../fixtures/clean-passport-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new PassportCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['4509 235857']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('235857', $result_set->getResultItems()->first()->getNumber());
    }

}
