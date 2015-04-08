<?php

/**
 * StringTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:51
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockString;

/**
 * Class StringTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class StringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\String
     */
    protected $string;

    /**
     * @var string
     */
    protected $value;

    protected function setUp()
    {
        $this->value  = 'This is a string.';
        $this->string = new MockString($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->string);
    }

    public function testNewFromInt()
    {
        $string = new MockString(1);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $string);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewException()
    {
        new MockString(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->string->isSameValueAs(new MockString($this->value)));
        $this->assertFalse($this->string->isSameValueAs(new MockString('This is another string.')));
    }

    public function testGetValue()
    {
        $value = $this->string->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertFalse($this->string->isNull());
    }

    public function testAsPdoValue()
    {
        $value = $this->string->asPdoValue();
        $this->assertSame($this->value, $value);
    }

    public function testToString()
    {
        $this->assertSame($this->value, $this->string->__toString());
    }
}
