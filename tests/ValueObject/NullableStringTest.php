<?php

/**
 * NullableStringTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:30
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockNullableString;

/**
 * Class NullableStringTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NullableStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Genro\Domain\ValueObject\ValueObject
     */
    protected $string;

    /**
     * @var string
     */
    protected $value;

    protected function setUp()
    {
        $this->value  = null;
        $this->string = new MockNullableString($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->string);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->string->isSameValueAs(new MockNullableString($this->value)));
        $this->assertFalse($this->string->isSameValueAs(new MockNullableString('This is another string.')));
    }

    public function testGetValue()
    {
        $value = $this->string->getValue();
        $this->assertSame($this->value, $value);
    }

    public function testIsNull()
    {
        $this->assertTrue($this->string->isNull());
    }

    public function testAsPdoValue()
    {
        $value = $this->string->asPdoValue();
        $this->assertSame($this->value, $value);
    }

    public function testToString()
    {
        $this->assertSame('', $this->string->__toString());
    }
}
