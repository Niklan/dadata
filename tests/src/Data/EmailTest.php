<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\Email;

/**
 * Provides test for email value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Email
 */
final class EmailTest extends DataTestCase {

  /**
   * {@inheritdoc}
   */
  public static $fixture = __DIR__ . '/../../fixtures/clean-email-response.json';

  /**
   * Test value storage in value object.
   *
   * @covers ::getSource
   * @covers ::getEmail
   * @covers ::getLocal
   * @covers ::getDomain
   * @covers ::getType
   * @covers ::getQc
   */
  public function testValidValueObject() {
    $email = Email::fromData($this->loadFixtureJsonAsArray()[0]);
    $this->assertSame('serega@yandex/ru', $email->getSource());
    $this->assertSame('serega@yandex.ru', $email->getEmail());
    $this->assertSame('serega', $email->getLocal());
    $this->assertSame('yandex.ru', $email->getDomain());
    $this->assertSame(Email::TYPE_PERSONAL, $email->getType());
    $this->assertSame('4', $email->getQc());
  }

  /**
   * Test factory for value object.
   *
   * @covers ::fromData
   */
  public function testFactory() {
    $email = Email::fromData($this->loadFixtureJsonAsArray()[0]);
    $this->assertInstanceOf(Email::class, $email);
  }

}