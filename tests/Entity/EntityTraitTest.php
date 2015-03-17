<?php

/**
 * Genro\Domain\Entity\EntityTraitTest.php
 *
 * @copyright GENRO Co.,Ltd.
 * @created   2014/07/21 17:57
 */
namespace Genro\Domain\Entity;

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
     * @var MockEntity
     */
    protected $entity;

    protected function setUp()
    {
        $this->entity = new MockEntity(
            'Yutaka Chiba', 'Komae Tokyo', new \DateTime('1978-05-29'), new \DateTime('2015-01-01 01:23:45')
        );
    }

    public function testNew()
    {
        $this->assertInstanceOf('Genro\Domain\Entity\Entity', $this->entity);
    }

    public function testGet()
    {
        $this->assertSame('Yutaka Chiba', $this->entity->name);
        $this->assertSame('Komae Tokyo', $this->entity->address);
        $this->assertSame('1978-05-29', $this->entity->birthday->format('Y-m-d'));
        $this->assertSame('2015-01-01 01:23:45', $this->entity->created_at);
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Not allowed to get the property. "Genro\Domain\Mock\MockEntity::unknown"
     */
    public function testGetException()
    {
        $this->entity->unknown;
    }

    public function testSet()
    {
        $this->entity->birthday = new \DateTime('2015-01-01');
        $this->assertSame('2015-01-01', $this->entity->birthday->format('Y-m-d'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Not allowed to set the property. "Genro\Domain\Mock\MockEntity::name"
     */
    public function testSetException()
    {
        $this->entity->name = 'Yutaka Chiba';
    }
}
