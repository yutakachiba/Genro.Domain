<?php

/**
 * DecimalTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:24
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockDecimal;

/**
 * Class DecimalTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class DecimalTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\ValueObject
     */
    protected $decimal;

    /**
     * @var string
     */
    protected $value;

    protected function setUp()
    {
        $this->value = '0.1';
        $this->decimal = new MockDecimal($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->decimal);
    }

    public function testNewFromInt()
    {
        $decimal = new MockDecimal(1);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $decimal);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewWithNull()
    {
        new MockDecimal(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->decimal->isSameValueAs(new MockDecimal($this->value)));
    }

    public function testGetValue()
    {
        $this->assertSame($this->value, $this->decimal->getValue());
    }

    public function testIsNull()
    {
        $this->assertFalse($this->decimal->isNull());
    }

    public function testAsPdoValue()
    {
        $this->assertSame($this->value, $this->decimal->asPdoValue());
    }

    public function testToString()
    {
        $this->assertSame($this->value, $this->decimal->__toString());
    }
}
