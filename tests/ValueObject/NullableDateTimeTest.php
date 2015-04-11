<?php

/**
 * NullableDateTimeTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:21
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockNullableDateTime;

/**
 * Class NullableDateTimeTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NullableDateTimeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\ValueObject
     */
    protected $dateTime;

    /**
     * @var null
     */
    protected $value;

    protected function setUp()
    {
        $this->value    = null;
        $this->dateTime = new MockNullableDateTime($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->dateTime);
    }

    public function testNewWithDateTime()
    {
        $dateTime = new MockNullableDateTime(new \DateTime('1978-05-29'));
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $dateTime);
        $this->assertInstanceOf('\DateTime', $dateTime->toNative());
    }

    public function testSameValueAs()
    {
        $dateTime = new MockNullableDateTime($this->value);
        $actual = $this->dateTime->sameValueAs($dateTime);
        $this->assertTrue($actual);

        $dateTime = new MockNullableDateTime('2015-01-01');
        $actual = $this->dateTime->sameValueAs($dateTime);
        $this->assertFalse($actual);
    }

    public function testToNative()
    {
        $value = $this->dateTime->toNative();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertTrue($this->dateTime->isNull());
    }

    public function testAsPdoValue()
    {
        $value = $this->dateTime->asPdoValue();
        $this->assertSame($this->value, $value);
    }

    public function testToString()
    {
        $this->assertSame('', $this->dateTime->__toString());
    }
}
