<?php

/**
 * CollectionTraitTest.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2015/02/20 4:08
 */
namespace Genro\Domain\Collection;

use Genro\Domain\Mock\MockCollection;
use Genro\Domain\Mock\MockEntity;

/**
 * Class CollectionTraitTest
 *
 * @package Genro\Domain\Collection
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class CollectionTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockCollection
     */
    protected $collection;

    /**
     * @var MockEntity[]
     */
    protected $entities;

    protected function setUp()
    {
        $this->entities = [
            new MockEntity('Yutaka Chiba', 'Komae Tokyo', new \DateTime('1978-05-29'), new \DateTime('2015-01-01 01:23:45')),
            new MockEntity('Yuka Chiba', 'Komae Tokyo', new \DateTime('1978-08-05'), new \DateTime('2015-01-01 01:23:45')),
        ];

        $this->collection = new MockCollection($this->entities);
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\Collection\CollectionInterface', $this->collection);
    }

    public function testGetIterator()
    {
        $iterator = $this->collection->getIterator();
        $this->assertInstanceOf('\ArrayIterator', $iterator);
    }

    public function testGet()
    {
        /** @var MockEntity $entity */
        $entity = $this->collection->get(0);
        $this->assertSame('Yutaka Chiba', $entity->name);
    }

    public function testAdd()
    {
        $entity = new MockEntity('Ryo Chiba', 'Komae Tokyo', new \DateTime('2012-07-11'), new \DateTime('2015-01-01 01:23:45'));
        $this->collection->add($entity);
        $this->assertSame($entity, $this->collection->get(2));
        $this->assertSame(3, $this->collection->count());
    }

    public function testRemove()
    {
        $entity = $this->collection->get(0);
        $this->collection->remove($entity);
        $this->assertSame(1, $this->collection->count());
    }

    public function testCount()
    {
        $this->assertSame(2, $this->collection->count());
    }
}
