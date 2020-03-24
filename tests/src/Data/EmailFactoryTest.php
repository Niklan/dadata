<?php

namespace Niklan\Dadata\Tests\Data;

use Niklan\DaData\Data\Email;
use Niklan\DaData\Data\EmailFactory;
use PHPUnit\Framework\TestCase;

/**
 * Provides test for email factory.
 *
 * @coversDefaultClass \Niklan\DaData\Data\EmailFactory
 */
final class EmailFactoryTest extends TestCase {

  /**
   * Tests that factory create required object.
   *
   * @covers ::create
   */
  public function testCanCreate(): void {
    $email_response = file_get_contents(__DIR__ . '/../../fixtures/clean-email-response.json');
    $json = json_decode($email_response, TRUE);
    $email_factory = new EmailFactory();
    $email = $email_factory->create($json[0]);
    $this->assertInstanceOf(Email::class, $email);
  }

}
