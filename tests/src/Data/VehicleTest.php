<?php

namespace Niklan\DaData\Tests\Data;

use Niklan\DaData\Data\Vehicle;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Provides test for vehicle value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Vehicle
 */
final class VehicleTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../fixtures/clean-vehicle-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getResult
     * @covers ::getBrand
     * @covers ::getModel
     * @covers ::getQc
     */
    public function testValidValueObject()
    {
        $object = Vehicle::fromData($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('форд фокус', $object->getSource());
        $this->assertSame('FORD FOCUS', $object->getResult());
        $this->assertSame('FORD', $object->getBrand());
        $this->assertSame('FOCUS', $object->getModel());
        $this->assertSame('0', $object->getQc());
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
        Vehicle::fromData($value);
    }

    /**
     * Test factory for value object.
     *
     * @covers ::fromData
     */
    public function testFactory()
    {
        $object = Vehicle::fromData($this->loadFixtureJsonAsArray()[0]);
        $this->assertInstanceOf(Vehicle::class, $object);
    }

}
