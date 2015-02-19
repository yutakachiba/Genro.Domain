<?php

/**
 * NaturalNumberTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:45
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockNaturalNumberValue;

/**
 * Class NaturalNumberTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NaturalNumberTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockNaturalNumberValue
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value = 1;
        $this->number = new MockNaturalNumberValue($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $this->number);
    }

    public function testNewFromString()
    {
        $number = new MockNaturalNumberValue('1');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $number);
    }

    public function testNewWithZero()
    {
        $number = new MockNaturalNumberValue(0);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $number);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must contain letters only 0-9. "-1" given.
     */
    public function testNewLessThanZero()
    {
        new MockNaturalNumberValue(-1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must be an integer. "double" given.
     */
    public function testNewWithFloat()
    {
        new MockNaturalNumberValue(0.1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must be an integer. "NULL" given.
     */
    public function testNewWithNull()
    {
        new MockNaturalNumberValue(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->number->isSameValueAs(new MockNaturalNumberValue(1)));
        $this->assertFalse($this->number->isSameValueAs(new MockNaturalNumberValue(2)));
    }

    public function testGetValue()
    {
        $value = $this->number->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testToString()
    {
        $this->assertSame('1', $this->number->__toString());
    }
}
