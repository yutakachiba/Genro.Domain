<?php

/**
 * StringTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:51
 */
namespace Genro\Domain\ValueObject;

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
        $this->string = new String($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->string);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewException()
    {
        new String(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->string->isSameValueAs(new String($this->value)));
        $this->assertFalse($this->string->isSameValueAs(new String('This is another string.')));
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
