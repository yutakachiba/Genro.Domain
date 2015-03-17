<?php

/**
 * NaturalNumberTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:45
 */
namespace Genro\Domain\ValueObject;

/**
 * Class NaturalNumberTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NaturalNumberTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\NaturalNumber
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value = 1;
        $this->number = new NaturalNumber($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->number);
    }

    public function testNewFromString()
    {
        $number = new NaturalNumber('1');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $number);
    }

    public function testNewWithZero()
    {
        $number = new NaturalNumber(0);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $number);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewLessThanZero()
    {
        new NaturalNumber(-1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithFloat()
    {
        new NaturalNumber(0.1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithNull()
    {
        new NaturalNumber(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->number->isSameValueAs(new NaturalNumber(1)));
        $this->assertFalse($this->number->isSameValueAs(new NaturalNumber(2)));
    }

    public function testGetValue()
    {
        $value = $this->number->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertFalse($this->number->isNull());
    }

    public function testAsPdoValue()
    {
        $this->assertSame(1, $this->number->asPdoValue());
    }

    public function testToString()
    {
        $this->assertSame('1', $this->number->__toString());
    }
}
