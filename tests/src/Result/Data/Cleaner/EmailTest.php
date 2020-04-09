<?php

namespace Niklan\DaData\Tests\Result\Data\Cleaner;

use Niklan\DaData\Exception\MissingRequiredDataValueException;
use Niklan\DaData\Result\Data\Cleaner\Email;
use Niklan\DaData\Tests\Result\Data\DataTestCase;

/**
 * Provides test for email value object.
 *
 * @coversDefaultClass \Niklan\DaData\Result\Data\Cleaner\Email
 */
final class EmailTest extends DataTestCase
{

    /**
     * {@inheritdoc}
     */
    protected $fixture = __DIR__ . '/../../../../fixtures/clean-email-response.json';

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
    public function testValidValueObject()
    {
        $email = new Email($this->loadFixtureJsonAsArray()[0]);
        $this->assertSame('serega@yandex/ru', $email->getSource());
        $this->assertSame('serega@yandex.ru', $email->getEmail());
        $this->assertSame('serega', $email->getLocal());
        $this->assertSame('yandex.ru', $email->getDomain());
        $this->assertSame(Email::TYPE_PERSONAL, $email->getType());
        $this->assertSame('4', $email->getQc());
    }

    /**
     * Test creating value object with missing required value.
     */
    public function testMissingRequiredValue()
    {
        $value = $this->loadFixtureJsonAsArray()[0];
        unset($value['source']);
        $this->expectException(MissingRequiredDataValueException::class);
        new Email($value);
    }

}
