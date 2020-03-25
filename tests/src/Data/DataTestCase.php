<?php

namespace Niklan\DaData\Tests\Data;

use PHPUnit\Framework\TestCase;

/**
 * Provides default implementation for data value object tests.
 */
abstract class DataTestCase extends TestCase {

  /**
   * The path to fixture response content.
   *
   * @var string
   */
  public static $fixture;

  /**
   * Loads fixture JSON value and returns as assoc array.
   *
   * @return array
   *   An assoc array with values from fixture.
   */
  protected function loadFixtureJsonAsArray(): array {
    $fixture_content = file_get_contents(static::$fixture);
    return json_decode($fixture_content, TRUE);
  }

}
