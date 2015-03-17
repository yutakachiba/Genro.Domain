<?php

/**
 * Collection.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:06
 */
namespace Genro\Domain\Collection;

use Genro\Domain\Entity\Entity;
use Traversable;

/**
 * Interface Collection
 *
 * @package Genro\Domain\Collection
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface Collection
{

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *       <b>Traversable</b>
     */
    public function getIterator();

    /**
     * @param Entity $entity
     */
    public function add(Entity $entity);

    /**
     * @param string|int
     * @return Entity
     */
    public function get($key);

    /**
     * @param Entity $entity
     */
    public function remove(Entity $entity);

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
    public function count();
}
