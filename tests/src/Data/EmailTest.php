<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\Email;
use PHPUnit\Framework\TestCase;

/**
 * Provides test for email value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Email
 */
final class EmailTest extends TestCase {

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
  public function testValueObject() {
    $email_response = file_get_contents(__DIR__ . '/../../fixtures/clean-email-response.json');
    $json = json_decode($email_response, TRUE);
    // First value.
    $email = new Email($json[0]);
    $this->assertSame('serega@yandex/ru', $email->getSource());
    $this->assertSame('serega@yandex.ru', $email->getEmail());
    $this->assertSame('serega', $email->getLocal());
    $this->assertSame('yandex.ru', $email->getDomain());
    $this->assertSame(Email::TYPE_PERSONAL, $email->getType());
    $this->assertSame('4', $email->getQc());
  }

}
