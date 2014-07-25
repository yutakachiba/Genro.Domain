<?php

/**
 * Genro\Domain\Entity
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/02 14:20
 */
namespace Genro\Domain\Entity;

/**
 * Interface EntityInterface
 *
 * @package Genro\Domain\Entity
 * @author yutakachiba@gmail.com
 */
interface EntityInterface extends \IteratorAggregate
{

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param mixed $name
     * @return bool
     */
    public function __isset($name);

    /**
     * @param mixed $name
     * @return mixed
     */
    public function __get($name);

    /**
     * __clone for clone
     */
    public function __clone();

    /**
     * @return array
     */
    public function __sleep();

    /**
     * @param array $properties
     * @return object
     */
    public static function __set_state(array $properties);

    /**
     * ArrayAccess::offsetExists
     *
     * @param mixed $name
     * @return bool
     */
    public function offsetExists($name);

    /**
     * ArrayAccess::offsetGet
     *
     * @param mixed $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function offsetGet($name);

    /**
     * IteratorAggregate::getIterator
     *
     * @return \ArrayIterator
     */
    public function getIterator();
}
