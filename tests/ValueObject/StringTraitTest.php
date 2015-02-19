<?php

/**
 * StringTraitTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:51
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockStringValue;

/**
 * Class StringTraitTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class StringTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockStringValue
     */
    protected $string;

    /**
     * @var \DateTime
     */
    protected $value;

    protected function setUp()
    {
        $this->value = 'This is a string.';
        $this->string = new MockStringValue($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $this->string);
    }

    public function testNewFromInt()
    {
        $string = new MockStringValue(123456);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObjectInterface', $string);
        $this->assertSame('123456', $string->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must be a string. "NULL" given.
     */
    public function testNewException()
    {
        new MockStringValue(null);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->string->isSameValueAs(new MockStringValue($this->value)));
        $this->assertFalse($this->string->isSameValueAs(new MockStringValue('This is another string.')));
    }

    public function testGetValue()
    {
        $value = $this->string->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testToString()
    {
        $this->assertSame($this->value, $this->string->__toString());
    }
}
