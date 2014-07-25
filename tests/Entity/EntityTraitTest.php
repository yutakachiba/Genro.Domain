<?php

/**
 * Genro\Domain\Entity\EntityTraitTest.php
 *
 * @copyright GENRO Co.,Ltd.
 * @created   2014/07/21 17:57
 */
namespace Genro\Domain\Entity;

use Genro\Domain\Mock\ChildEntity;
use Genro\Domain\Mock\MockEntity;

/**
 * Class Genro\Domain\Entity\EntityTraitTest
 *
 * @package Genro\Domain\Entity
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class EntityTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var array
     */
    protected $properties;

    protected function setUp()
    {
        $properties = [];
        $properties['mockId']      = 1;
        $properties['title']       = 'エンティティのテスト';
        $properties['createdAt']   = '2014-07-01 13:00:00';
        $properties['body']        = '本文です。';
        $properties['childEntity'] = new ChildEntity([
            'childId' => 10,
            'image01' => 'image01.jpg',
            'image02' => 'image02.jpg',
            'image03' => 'image03.jpg',
        ]);

        $this->properties = $properties;
    }

    protected function tearDown()
    {
    }

    public function testNew()
    {
        $actual = new MockEntity($this->properties);
        $expected = '\Genro\Domain\Entity\EntityInterface';

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNewExceptionNoKey()
    {
        $properties = $this->properties;
        $properties['mock_id'] = 1;

        new MockEntity($properties);
    }

    /**
     * @expectedException \Exception
     */
    public function testNewExceptionInvalidType()
    {
        $properties = $this->properties;
        $properties['childEntity'] = 'childEntity';

        new MockEntity($properties);
    }

    public function testToArray()
    {
        $entity = new MockEntity($this->properties);
        $properties = $entity->toArray();

        $actual   = $properties['mockId'];
        $expected = 1;
        $this->assertSame($expected, $actual);

        $actual   = $properties['title'];
        $expected = 'エンティティのテスト';
        $this->assertSame($expected, $actual);

        $actual   = $properties['createdAt'];
        $expected = '2014-07-01 13:00:00';
        $this->assertSame($expected, $actual);

        $actual   = $properties['body'];
        $expected = '本文です。';
        $this->assertSame($expected, $actual);

        $actual   = $properties['childEntity'];
        $expected = ['childId' => 10, 'image01' => 'image01.jpg', 'image02' => 'image02.jpg', 'image03' => 'image03.jpg'];
        $this->assertSame($expected, $actual);
    }

    public function testIsset()
    {
        $entity = new MockEntity($this->properties);

        $actual = isset($entity->mockId);
        $this->assertTrue($actual);

        $actual = isset($entity->childId);
        $this->assertFalse($actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGet()
    {
        $entity = new MockEntity($this->properties);

        $actual   = $entity->mockId;
        $expected = 1;
        $this->assertSame($expected, $actual);

        $actual   = $entity->childEntity->toArray();
        $expected = ['childId' => 10, 'image01' => 'image01.jpg', 'image02' => 'image02.jpg', 'image03' => 'image03.jpg'];
        $this->assertSame($expected, $actual);

        $entity->childId;
    }

    public function testClone()
    {
        $entity = new MockEntity($this->properties);

        $cloneEntity = clone $entity;

        $actual   = $entity->toArray();
        $expected = $cloneEntity->toArray();

        $this->assertSame($expected, $actual);
    }

    public function testSleep()
    {
        $entity = new MockEntity($this->properties);
        $serialized   = serialize($entity);
        $unserialized = unserialize($serialized);

        $actual   = $entity->toArray();
        $expected = $unserialized->toArray();

        $this->assertSame($expected, $actual);
    }

    public function testSetState()
    {
        $entity = new MockEntity($this->properties);

        $exportEntity = null;
        eval('$exportEntity = ' . var_export($entity, true) . ';');

        $actual   = $entity->toArray();
        $expected = $exportEntity->toArray();

        $this->assertSame($expected, $actual);
    }

    public function testOffsetExists()
    {
        $entity = new MockEntity($this->properties);

        $actual = $entity->offsetExists('mockId');
        $this->assertTrue($actual);

        $actual = $entity->offsetExists('childId');
        $this->assertFalse($actual);
    }

    public function testOffsetGet()
    {
        $entity = new MockEntity($this->properties);

        $actual   = $entity->offsetGet('mockId');
        $expected = 1;
        $this->assertSame($expected, $actual);
    }

    public function testGetIterator()
    {
        $entity = new MockEntity($this->properties);

        $list = [];

        foreach ($entity as $key => $value) {
            $list[$key] = $value;
        }

        $actual   = $list['mockId'];
        $expected = 1;

        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \LogicException
     */
    public function testSet()
    {
        $entity = new MockEntity($this->properties);
        $entity->mockId = 2;
    }

    /**
     * @expectedException \LogicException
     */
    public function testUnset()
    {
        $entity = new MockEntity($this->properties);
        unset($entity->mockId);
    }

    /**
     * @expectedException \LogicException
     */
    public function testOffsetSet()
    {
        $entity = new MockEntity($this->properties);
        $entity->offsetSet('mockId', 2);
    }

    /**
     * @expectedException \LogicException
     */
    public function testOffsetUnset()
    {
        $entity = new MockEntity($this->properties);
        $entity->offsetUnset('mockId');
    }
}
