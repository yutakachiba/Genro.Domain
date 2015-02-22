<?php

/**
 * DateTimeTraitTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:34
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockDateTimeValue;

/**
 * Class DateTimeTraitTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTimeTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockDateTimeValue
     */
    protected $dateTime;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value = new \DateTime('1978-05-29');
        $this->dateTime = new MockDateTimeValue($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $this->dateTime);
    }

    public function testNewWithString()
    {
        $dateTime = new MockDateTimeValue('1978-05-29 00:00:00');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $dateTime);
        $this->assertInstanceOf('\DateTime', $dateTime->getValue());
    }

    public function testNewWithNull()
    {
        $dateTime = new MockDateTimeValue(null);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $dateTime);
        $this->isNull($dateTime->getValue());
        $this->assertSame('', $dateTime->__toString());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must be a \DateTime or "Y-m-d H:i:s" format string. "array" given.
     */
    public function testNewException()
    {
        new MockDateTimeValue([]);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->dateTime->isSameValueAs(new MockDateTimeValue('1978-05-29 00:00:00')));
        $this->assertFalse($this->dateTime->isSameValueAs(new MockDateTimeValue('2015-01-01 00:00:00')));
    }

    public function testGetValue()
    {
        $value = $this->dateTime->getValue();
        $this->assertSame($this->value, $value);
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
