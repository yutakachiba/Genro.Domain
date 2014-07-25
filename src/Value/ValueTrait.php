<?php

/**
 * ValueTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/02 14:57
 */
namespace Genro\Domain\Value;

/**
 * Trait ValueTrait
 *
 * @package Genro\Domain\Value
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
trait ValueTrait
{

    /**
     * @param mixed $value
     * @param array $options
     */
    public function __construct($value = null, $options = [])
    {
        $this->initialize($value, $options);
    }

    /**
     * @param mixed $value
     * @param array $options
     * @return $this
     * @throws \InvalidArgumentException
     */
    private function initialize($value = null, $options = [])
    {
        foreach (array_keys(get_object_vars($this)) as $name) {

            $this->{$name} = null;

            if (array_key_exists($name, $options)) {

                $option = (is_object($options[$name])) ? clone $options[$name] : $options[$name];

                if (method_exists($this, 'set' . $name)) {
                    $this->{'set' . $name}($option);
                } else {
                    $this->{$name} = $option;
                }

                unset($options[$name]);
            }
        }

        if (count($options) !== 0) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Not supported properties [%s].',
                    implode(', ', array_keys($options))
                )
            );
        }

        $this->value = (is_object($value)) ? clone $value : $value;

        return $this;
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
     * @param array $options
     * @return object
     */
    public static function __set_state(array $options)
    {
        $value = null;

        if (isset($options['value'])) {
            $value = $options['value'];
            unset($options['value']);
        }

        return new static($value, $options);
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
