<?php

/**
 * ValueInterface.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/02 14:52
 */
namespace Genro\Domain\Value;

/**
 * Interface ValueInterface
 *
 * @package Genro\Domain\Value
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface ValueInterface
{

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function __toString();

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
}
