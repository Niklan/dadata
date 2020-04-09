<?php

namespace Niklan\DaData\Tests\Result\Data\Cleaner;

use Niklan\DaData\Exception\MissingRequiredDataValueException;
use Niklan\DaData\Result\Data\Cleaner\BirthDate;
use Niklan\DaData\Tests\Result\Data\DataTestCase;

/**
 * Provides test for birth date value object.
 *
 * @coversDefaultClass \Niklan\DaData\Result\Data\Cleaner\BirthDate
 */
final class BirthDateTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../../../fixtures/clean-birthdate-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getBirthDate
     * @covers ::getQc
     */
    public function testValidValueObject()
    {
        $object = new BirthDate($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('24/3/12', $object->getSource());
        $this->assertSame('24.03.2012', $object->getBirthDate());
        $this->assertSame('1', $object->getQc());
    }

    /**
     * Test creating value object with missing required value.
     */
    public function testMissingRequiredValue()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        unset($value['source']);
        $this->expectException(MissingRequiredDataValueException::class);
        new BirthDate($value);
    }

}
