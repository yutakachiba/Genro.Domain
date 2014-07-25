<?php

/**
 * EntityTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2014/07/02 14:21
 */
namespace Genro\Domain\Entity;

/**
 * Trait EntityTrait
 *
 * @package Genro\Domain\Entity
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait EntityTrait
{

    /**
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->initialize($properties);
    }

    /**
     * @param array $properties
     * @return $this
     * @throws \InvalidArgumentException
     */
    private function initialize(array $properties = [])
    {
        foreach (array_keys(get_object_vars($this)) as $name) {

            $this->{$name} = null;

            if (array_key_exists($name, $properties)) {

                $value = (is_object($properties[$name])) ? clone $properties[$name] : $properties[$name];

                if (method_exists($this, 'set' . $name)) {
                    $this->{'set' . $name}($value);
                } else {
                    $this->{$name} = $value;
                }

                unset($properties[$name]);
            }
        }

        if (count($properties) !== 0) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Not supported properties [%s].',
                    implode(', ', array_keys($properties))
                )
            );
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $values = [];

        foreach (array_keys(get_object_vars($this)) as $name) {
            $value         = $this->__get($name);
            $values[$name] = ($value instanceof EntityInterface) ? $value->toArray() : $value;
        }

        return $values;
    }

    /**
     * @param mixed $name
     * @return bool
     */
    public function __isset($name)
    {
        return property_exists($this, $name);
    }

    /**
     * @param mixed $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {
        if (method_exists($this, 'get' . $name)) {
            return $this->{'get' . $name}();
        }

        if (!property_exists($this, $name)) {
            throw new \InvalidArgumentException(
                sprintf('The property "%s" does not exists.', $name)
            );
        }

        return $this->{$name};
    }

    /**
     * __clone for clone
     */
    public function __clone()
    {
        foreach (get_object_vars($this) as $name => $value) {
            if (is_object($value)) {
                $this->{$name} = clone $value;
            }
        }
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return array_keys(get_object_vars($this));
    }

    /**
     * @param array $properties
     * @return object
     */
    public static function __set_state(array $properties)
    {
        return new static($properties);
    }

    /**
     * ArrayAccess::offsetExists
     *
     * @param mixed $name
     * @return bool
     */
    public function offsetExists($name)
    {
        return $this->__isset($name);
    }

    /**
     * ArrayAccess::offsetGet
     *
     * @param mixed $name
     * @return mixed
     */
    public function offsetGet($name)
    {
        return $this->__get($name);
    }

    /**
     * ArrayIterator::getIterator
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator(get_object_vars($this));
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * @throws \LogicException
     */
    final public function __set($name, $value)
    {
        throw new \LogicException(
            sprintf('The property "%s" could not set.', $name)
        );
    }

    /**
     * @param mixed $name
     * @throws \LogicException
     */
    final public function __unset($name)
    {
        throw new \LogicException(
            sprintf('The property "%s" could not unset.', $name)
        );
    }

    /**
     * ArrayAccess::offsetSet
     *
     * @param mixed $name
     * @param mixed $value
     * @throws \LogicException
     */
    public function offsetSet($name, $value)
    {
        throw new \LogicException(
            sprintf('The property "%s" could not set.', $name)
        );
    }

    /**
     * ArrayAccess::offsetUnset
     *
     * @param mixed $name
     * @throws \LogicException
     */
    public function offsetUnset($name)
    {
        throw new \LogicException(
            sprintf('The property "%s" could not unset.', $name)
        );
    }
}
