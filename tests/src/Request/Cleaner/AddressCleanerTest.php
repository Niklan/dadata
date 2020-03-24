<?php

namespace Niklan\DaData\Tests\Request\Cleaner;

use Niklan\DaData\Request\Cleaner\AddressCleaner;
use Niklan\DaData\Tests\Request\FixtureResponseTestCase;

/**
 * Provides test for AddressCleaner clean request.
 *
 * @coversDefaultClass \Niklan\DaData\Request\Cleaner\AddressCleaner
 */
final class AddressCleanerTest extends FixtureResponseTestCase {

  /**
   * {@inheritdoc}
   */
  public static $fixture = __DIR__ . '/../../../fixtures/clean-address-response.json';

  /**
   * Tests sending request.
   *
   * @covers ::clean
   */
  public function testRequest(): void {
    $address_cleaner = new AddressCleaner($this->getDaDataClient());
    $response = $address_cleaner->clean('мск сухонска 11/-89');
    $this->assertSame(200, $response->getStatusCode());
  }

}
