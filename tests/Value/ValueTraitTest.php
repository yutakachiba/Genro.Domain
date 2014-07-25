<?php

/**
 * Genro\Domain\Value\ValueTraitTest.php
 *
 * @copyright GENRO Co.,Ltd.
 * @created   2014/07/21 17:57
 */
namespace Genro\Domain\Value;

use Genro\Domain\Mock\MockValue;

/**
 * Class Genro\Domain\Value\ValueTraitTest
 *
 * @package Genro\Domain\Value
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class ValueTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var object
     */
    protected $value;

    /**
     * @var array
     */
    protected $options;

    protected function setUp()
    {
        $this->value = new \stdClass();
        $this->value->userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36';
        $this->options = [
            'os'             => 'Mac OS X',
            'osVersion'      => '10_9_3',
            'browser'        => 'Chrome',
            'browserVersion' => '35.0'
        ];
    }

    protected function tearDown()
    {
    }

    public function testNew()
    {
        $actual = new MockValue($this->value, $this->options);
        $expected = '\Genro\Domain\Value\ValueInterface';

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewExceptionNoKey()
    {
        $options = $this->options;
        $options['dummy_id'] = 1;

        new MockValue($this->value, $options);
    }

    public function testIsset()
    {
        $value = new MockValue($this->value, $this->options);

        $actual = isset($value->os);
        $this->assertTrue($actual);

        $actual = isset($value->unknown);
        $this->assertFalse($actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGet()
    {
        $value = new MockValue($this->value, $this->options);

        $actual   = $value->os;
        $expected = 'Mac OS X';
        $this->assertSame($expected, $actual);

        $value->unknown;
    }

    public function testClone()
    {
        $value = new MockValue($this->value, $this->options);

        $cloneValue = clone $value;

        $actual   = (string)$value;
        $expected = (string)$cloneValue;

        $this->assertSame($expected, $actual);
    }

    public function testSleep()
    {
        $value = new MockValue($this->value, $this->options);
        $serialized   = serialize($value);
        $unserialized = unserialize($serialized);

        $actual   = (string)$value;
        $expected = (string)$unserialized;

        $this->assertSame($expected, $actual);
    }

    public function testSetState()
    {
        $value = new MockValue($this->value, $this->options);

        $exportValue = null;
//        eval('$exportValue = ' . var_export($value, true) . ';');

        $actual   = (string)$value;
        $expected = (string)$exportValue;

        $this->assertSame($expected, $actual);
    }

    public function testOffsetExists()
    {
        $value = new MockValue($this->value, $this->options);

        $actual = $value->offsetExists('os');
        $this->assertTrue($actual);

        $actual = $value->offsetExists('unknown');
        $this->assertFalse($actual);
    }

    public function testOffsetGet()
    {
        $value = new MockValue($this->value, $this->options);

        $actual   = $value->offsetGet('browser');
        $expected = 'Chrome';
        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \LogicException
     */
    public function testSet()
    {
        $value = new MockValue($this->value, $this->options);
        $value->os = 'Windows';
    }

    /**
     * @expectedException \LogicException
     */
    public function testUnset()
    {
        $value = new MockValue($this->value, $this->options);
        unset($value->os);
    }

    /**
     * @expectedException \LogicException
     */
    public function testOffsetSet()
    {
        $value = new MockValue($this->value, $this->options);
        $value->offsetSet('os', 'Windows');
    }

    /**
     * @expectedException \LogicException
     */
    public function testOffsetUnset()
    {
        $value = new MockValue($this->value, $this->options);
        $value->offsetUnset('os');
    }
}
