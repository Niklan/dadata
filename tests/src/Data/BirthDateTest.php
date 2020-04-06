<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\BirthDate;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Provides test for birth date value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\BirthDate
 */
final class BirthDateTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../fixtures/clean-birthdate-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getBirthDate
     * @covers ::getQc
     */
    public function testValidValueObject()
    {
        $object = BirthDate::fromData($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('24/3/12', $object->getSource());
        $this->assertSame('24.03.2012', $object->getBirthDate());
        $this->assertSame('1', $object->getQc());
    }

    /**
     * Test creating value object with missing required value.
     *
     * @covers ::fromData
     */
    public function testMissingRequiredValue()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        unset($value['source']);
        $this->expectException(MissingRequiredDataValueException::class);
        BirthDate::fromData($value);
    }

    /**
     * Test factory for value object.
     *
     * @covers ::fromData
     */
    public function testFactory()
    {
        $object = BirthDate::fromData($this->loadFixtureJsonAsArray()[0]);
        $this->assertInstanceOf(BirthDate::class, $object);
    }

}
