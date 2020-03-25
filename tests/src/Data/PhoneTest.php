<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\Phone;

/**
 * Provides test for phone value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Phone
 */
final class PhoneTest extends DataTestCase {

  /**
   * {@inheritdoc}
   */
  public static $fixture = __DIR__ . '/../../fixtures/clean-phone-response.json';

  /**
   * Test value storage in value object.
   *
   * @covers ::getSource
   * @covers ::getType
   * @covers ::getPhone
   */
  public function testValidValueObject() {
    $phone = Phone::fromData($this->loadFixtureJsonAsArray()[0]);
    $this->assertSame('раб 846)231.60.14 *139', $phone->getSource());
    $this->assertSame(Phone::TYPE_STATIONARY, $phone->getType());
    $this->assertSame('+7 846 231-60-14 доб. 139', $phone->getPhone());
  }

  /**
   * Test factory for value object.
   *
   * @covers ::fromData
   */
  public function testFactory() {
    $phone = Phone::fromData($this->loadFixtureJsonAsArray()[0]);
    $this->assertInstanceOf(Phone::class, $phone);
  }

}
