<?php

namespace Niklan\Dadata\Tests;

use Niklan\Dadata\Auth;
use PHPUnit\Framework\TestCase;

/**
 * Provides testing for auth object.
 *
 * @coversDefaultClass \Niklan\Dadata\Auth
 */
final class AuthTest extends TestCase {

  /**
   * Test auth without any credentials.
   *
   * @covers ::__construct
   */
  public function testMissingToken(): void {
    $this->expectException(\ArgumentCountError::class);
    new Auth();
  }

  /**
   * Tests token store.
   *
   * @covers ::getToken
   */
  public function testToken(): void {
    $auth = new Auth('dadata-token');
    $this->assertSame('dadata-token', $auth->getToken());
  }

  /**
   * Tests secret store.
   *
   * @covers ::getSecret
   */
  public function testSecret(): void {
    $auth = new Auth('dadata-token', 'dadata-secret');
    $this->assertSame('dadata-secret', $auth->getSecret());
  }

  /**
   * Tests an empty secret value.
   *
   * @covers ::getSecret
   */
  public function testEmptySecret(): void {
    $auth = new Auth('dadata-token');
    $this->assertNull($auth->getSecret());
  }

}
