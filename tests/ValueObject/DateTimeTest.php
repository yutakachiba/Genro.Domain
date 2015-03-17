<?php

/**
 * DateTimeTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:34
 */
namespace Genro\Domain\ValueObject;

/**
 * Class DateTimeTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\DateTime
     */
    protected $dateTime;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value    = new \DateTime('1978-05-29');
        $this->dateTime = new DateTime($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->dateTime);
    }

    public function testNewWithString()
    {
        $dateTime = new DateTime('1978-05-29 00:00:00');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $dateTime);
        $this->assertInstanceOf('\DateTime', $dateTime->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithInvalidString()
    {
        new DateTime('1234-13-99');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithNull()
    {
        new DateTime(null);
    }

    public function testIsSameValueAs()
    {
        $dateTime = new DateTime($this->value);
        $actual = $this->dateTime->isSameValueAs($dateTime);
        $this->assertTrue($actual);

        $dateTime = new DateTime('2015-01-01');
        $actual = $this->dateTime->isSameValueAs($dateTime);
        $this->assertFalse($actual);
    }

    public function testGetValue()
    {
        $value = $this->dateTime->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertFalse($this->dateTime->isNull());
    }

    public function testAsPdoValue()
    {
        $value = $this->dateTime->asPdoValue();
        $this->assertSame($this->value->format('Y-m-d H:i:s'), $value);
    }

    public function testToString()
    {
        $this->assertSame($this->value->format('Y-m-d H:i:s'), $this->dateTime->__toString());
    }

    public function testIsNull()
    {
        $this->assertFalse($this->dateTime->isNull());

        $dateTime = new MockDateTimeValue(null);
        $this->assertTrue($dateTime->isNull());
    }
}
