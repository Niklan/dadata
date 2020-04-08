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
    public $fixture = __DIR__ . '/../../../fixtures/clean-email-response.json';

    /**
     * Tests sending request.
     *
     * @covers ::clean
     */
    public function testRequest(): void
    {
        $cleaner = new EmailCleaner($this->getDaDataClient());
        $result_set = $cleaner->clean(['serega@yandex/ru']);
        $this->assertSame(200, $result_set->getResponseStatusCode());
        $this->assertSame(1, $result_set->getResultItems()->count());
        $this->assertSame('serega@yandex/ru', $result_set->getResultItems()->first()->getSource());
    }

}
