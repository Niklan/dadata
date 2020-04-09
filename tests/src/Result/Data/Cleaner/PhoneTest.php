<?php

namespace Niklan\DaData\Tests\Result\Data\Cleaner;

use Niklan\DaData\Exception\MissingRequiredDataValueException;
use Niklan\DaData\Result\Data\Cleaner\Phone;
use Niklan\DaData\Tests\Result\Data\DataTestCase;

/**
 * Provides test for phone value object.
 *
 * @coversDefaultClass \Niklan\DaData\Result\Data\Cleaner\Phone
 */
final class PhoneTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../../../fixtures/clean-phone-response.json';

    /**
     * Test value storage in value object.
     *
     * @covers ::getSource
     * @covers ::getType
     * @covers ::getPhone
     * @covers ::getCountryCode
     * @covers ::getCityCode
     * @covers ::getNumber
     * @covers ::getExtension
     * @covers ::getProvider
     * @covers ::getCountry
     * @covers ::getRegion
     * @covers ::getCity
     * @covers ::getTimezone
     * @covers ::getQcConflict
     */
    public function testValidValueObject()
    {
        $phone = new Phone($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('раб 846)231.60.14 *139', $phone->getSource());
        $this->assertSame(Phone::TYPE_STATIONARY, $phone->getType());
        $this->assertSame('+7 846 231-60-14 доб. 139', $phone->getPhone());
        $this->assertSame(7, $phone->getCountryCode());
        $this->assertSame(846, $phone->getCityCode());
        $this->assertSame(2316014, $phone->getNumber());
        $this->assertSame(139, $phone->getExtension());
        $this->assertSame('ООО "СИПАУТНЭТ"', $phone->getProvider());
        $this->assertSame('Россия', $phone->getCountry());
        $this->assertSame('Самарская область', $phone->getRegion());
        $this->assertSame('Самара', $phone->getCity());
        $this->assertSame('UTC+4', $phone->getTimezone());
        $this->assertSame(0, $phone->getQcConflict());
        $this->assertSame(0, $phone->getQc());
    }

    /**
     * Test creating value object with missing required value.
     */
    public function testMissingRequiredValue()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        unset($value['source']);
        $this->expectException(MissingRequiredDataValueException::class);
        new Phone($value);
    }

}
