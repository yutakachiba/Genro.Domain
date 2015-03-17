<?php

/**
 * CollectionTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:04
 */
namespace Genro\Domain\Collection;

use Genro\Domain\Entity\Entity;
use Traversable;

/**
 * Trait CollectionTrait
 *
 * @package Genro\Domain\Collection
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait CollectionTrait
{

    /**
     * @var Entity[]
     */
    private $items;

    /**
     * @param Entity[] $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *       <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @param Entity $entity
     */
    public function add(Entity $entity)
    {
        $this->items[] = $entity;
    }

    /**
     * @param string|int
     * @return Entity
     */
    public function get($key)
    {
        return $this->items[$key];
    }

    /**
     * @param Entity $entity
     */
    public function remove(Entity $entity)
    {
        foreach ($this->items as $key => $value) {
            if ($value === $entity) {
                unset($this->items[$key]);
                break;
            }
        }
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->items);
    }
}
