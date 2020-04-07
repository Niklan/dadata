<?php

namespace Niklan\DaData\Tests\Data;

use InvalidArgumentException;
use Niklan\DaData\Data\Name;
use Niklan\DaData\Exception\MissingRequiredDataValueException;

/**
 * Provides test for vehicle value object.
 *
 * @coversDefaultClass \Niklan\DaData\Data\Name
 */
final class NameTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../fixtures/clean-name-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getResult
     * @covers ::getGenitive
     * @covers ::getDative
     * @covers ::getAblative
     * @covers ::getSurname
     * @covers ::getName
     * @covers ::getPatronymic
     * @covers ::getGender
     * @covers ::getQc
     */
    public function testValidValueObject()
    {
        $object = new Name($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('Срегей владимерович иванов', $object->getSource());
        $this->assertSame('Иванов Сергей Владимирович', $object->getResult());
        $this->assertSame('Иванова Сергея Владимировича', $object->getGenitive());
        $this->assertSame('Иванову Сергею Владимировичу', $object->getDative());
        $this->assertSame('Ивановым Сергеем Владимировичем', $object->getAblative());
        $this->assertSame('Иванов', $object->getSurname());
        $this->assertSame('Сергей', $object->getName());
        $this->assertSame('Владимирович', $object->getPatronymic());
        $this->assertSame(Name::GENDER_MALE, $object->getGender());
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
        new Name($value);
    }

    /**
     * Test passing not allowed gender value.
     */
    public function testWrongGender()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        // Latin 'M'. The allowed values in cyrillic and provided by API.
        $value['gender'] = 'M';
        $this->expectException(InvalidArgumentException::class);
        new Name($value);
    }

}
