<?php

/**
 * NullableDecimalTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 13:17
 */
namespace Genro\Domain\ValueObject;

use Genro\Domain\Mock\MockNullableDecimal;

/**
 * Class NullableDecimalTest
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NullableDecimalTest extends \PHPUnit_Framework_TestCase
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
        $this->value = null;
        $this->decimal = new MockNullableDecimal($this->value);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $this->decimal);
    }

    public function testNewFromFloat()
    {
        $decimal = new MockNullableDecimal(1.0);
        $this->assertInstanceOf('Genro\Domain\ValueObject\ValueObject', $decimal);
    }

    public function testIsSameValueAs()
    {
        $this->assertTrue($this->decimal->isSameValueAs(new MockNullableDecimal($this->value)));
    }

    public function testGetValue()
    {
        $this->assertSame($this->value, $this->decimal->getValue());
    }

    public function testIsNull()
    {
        $this->assertTrue($this->decimal->isNull());
    }

    public function testAsPdoValue()
    {
        $this->assertSame($this->value, $this->decimal->asPdoValue());
    }

    public function testToString()
    {
        $this->assertSame('', $this->decimal->__toString());
    }
}
