<?php

/**
 * Genro\Domain\Value\DateTimeTest.php
 *
 * @copyright GENRO Co.,Ltd.
 * @created   2014/07/21 17:57
 */
namespace Genro\Domain\Value;

/**
 * Class Genro\Domain\Value\DateTimeTest
 *
 * @package Genro\Domain\Value
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var DateTime
     */
    protected $value;

    /**
     * @var int
     */
    protected $timestamp;

    protected function setUp()
    {
        $this->value = new DateTime('2014-07-25 15:15:30');
        $this->timestamp = mktime(15, 15, 30, 7, 25, 2014);
    }

    protected function tearDown()
    {
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNew()
    {
        $actual   = new DateTime();
        $expected = '\Genro\Domain\Value\DateTime';

        $this->assertInstanceOf($expected, $actual);

        $actual   = new DateTime($this->timestamp);
        $expected = '\Genro\Domain\Value\DateTime';

        $this->assertInstanceOf($expected, $actual);

        $actual   = new DateTime('2014-01-01 12:30:00');
        $expected = '\Genro\Domain\Value\DateTime';

        $this->assertInstanceOf($expected, $actual);

        new DateTime([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewTimezone()
    {
        $actual = new DateTime('2014-01-01 12:30:00', ['timezone' => 'Asia/Tokyo']);
        $expected = '\Genro\Domain\Value\DateTime';
        $this->assertInstanceOf($expected, $actual);

        $actual = new DateTime('2014-01-01 12:30:00', ['timezone' => new \DateTimeZone('Asia/Tokyo')]);
        $expected = '\Genro\Domain\Value\DateTime';
        $this->assertInstanceOf($expected, $actual);

        new DateTime('2014-01-01 12:30:00', ['timezone' => false]);
    }

    public function testFormat()
    {
        $dateTime = new DateTime('2014-01-01 12:30:00', ['format' => 'Y/m/d H:i:s']);

        $actual   = (string)$dateTime;
        $expected = '2014/01/01 12:30:00';

        $this->assertSame($expected, $actual);

        $dateTime = new DateTime('2014-01-01 12:30:00', ['format' => 'ymd']);

        $actual   = (string)$dateTime;
        $expected = '140101';

        $this->assertSame($expected, $actual);
    }

    public function testGetValue()
    {
        $actual   = $this->value->getValue();
        $expected = '\DateTime';

        $this->assertInstanceOf($expected, $actual);
    }

    public function testToString()
    {
        $actual   = (string)$this->value;
        $expected = '2014-07-25 15:15:30';

        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testCall()
    {
        /** @var \DateTimeZone $timeZone */
        $timeZone = $this->value->getTimezone();

        $actual   = $timeZone->getName();
        $expected = 'Asia/Tokyo';

        $this->assertSame($expected, $actual);

        $this->value->getUnknownMethod();
    }

    public function testGetYear()
    {
        $actual   = $this->value->getYear();
        $expected = 2014;

        $this->assertSame($expected, $actual);
    }

    public function testGetMonth()
    {
        $actual   = $this->value->getMonth();
        $expected = 7;

        $this->assertSame($expected, $actual);
    }

    public function testGetDay()
    {
        $actual   = $this->value->getDay();
        $expected = 25;

        $this->assertSame($expected, $actual);
    }

    public function testGetHour()
    {
        $actual   = $this->value->getHour();
        $expected = 15;

        $this->assertSame($expected, $actual);
    }

    public function testGetMinute()
    {
        $actual   = $this->value->getMinute();
        $expected = 15;

        $this->assertSame($expected, $actual);
    }

    public function testGetSecond()
    {
        $actual   = $this->value->getSecond();
        $expected = 30;

        $this->assertSame($expected, $actual);
    }

    public function testGetTimestamp()
    {
        $actual   = $this->value->getTimestamp();
        $expected = $this->timestamp;

        $this->assertSame($expected, $actual);
    }

    public function testGetDateTime()
    {
        $actual   = $this->value->getDateTime();
        $expected = '\DateTime';

        $this->assertInstanceOf($expected, $actual);
    }

    public function testGetLastDay()
    {
        $actual   = $this->value->getLastDay();
        $expected = 31;

        $this->assertSame($expected, $actual);
    }
}
