<?php

/**
 * NullableNaturalNumberTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:27
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockNullableNaturalNumber;

/**
 * Class NullableNaturalNumberTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NullableNaturalNumberTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\ValueObject
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value  = null;
        $this->number = new MockNullableNaturalNumber($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->number);
    }

    public function testNewFromString()
    {
        $number = new MockNullableNaturalNumber('1');
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $number);
    }

    public function testSameValueAs()
    {
        $this->assertTrue($this->number->sameValueAs(new MockNullableNaturalNumber($this->value)));
        $this->assertFalse($this->number->sameValueAs(new MockNullableNaturalNumber(2)));
    }

    public function testToNative()
    {
        $value = $this->number->toNative();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertTrue($this->number->isNull());
    }

    public function testAsPdoValue()
    {
        $this->assertSame($this->value, $this->number->asPdoValue());
    }

    public function testToString()
    {
        $this->assertSame('', $this->number->__toString());
    }
}
