<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\Passport;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Provides test for passport value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Passport
 */
final class PassportTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../fixtures/clean-passport-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getSeries
     * @covers ::getNumber
     * @covers ::getQc
     */
    public function testValidValueObject()
    {
        $object = new Passport($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('4509 235857', $object->getSource());
        $this->assertSame('45 09', $object->getSeries());
        $this->assertSame('235857', $object->getNumber());
        $this->assertSame('0', $object->getQc());
    }

    /**
     * Test creating value object with missing required value.
     */
    public function testMissingRequiredValue()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        unset($value['source']);
        $this->expectException(MissingRequiredDataValueException::class);
        new Passport($value);
    }

}
