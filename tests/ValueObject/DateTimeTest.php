<?php

/**
 * DateTimeTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:34
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockDateTime;

/**
 * Class DateTimeTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\ValueObject
     */
    protected $dateTime;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value    = new \DateTime('1978-05-29');
        $this->dateTime = new MockDateTime($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->dateTime);
    }

    public function testNewWithString()
    {
        $dateTime = new MockDateTime('1978-05-29 00:00:00');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $dateTime);
        $this->assertInstanceOf('\DateTime', $dateTime->toNative());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithNull()
    {
        new MockDateTime(null);
    }

    public function testSameValueAs()
    {
        $dateTime = new MockDateTime($this->value);
        $actual = $this->dateTime->sameValueAs($dateTime);
        $this->assertTrue($actual);

        $dateTime = new MockDateTime('2015-01-01');
        $actual = $this->dateTime->sameValueAs($dateTime);
        $this->assertFalse($actual);
    }

    public function testToNative()
    {
        $value = $this->dateTime->toNative();
        $this->assertInstanceOf('\DateTime', $value);
        $this->assertSame($this->value->format('Y-m-d H:i:s'), $value->format('Y-m-d H:i:s'));
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
}
