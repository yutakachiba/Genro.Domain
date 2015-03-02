<?php

/**
 * EntityTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2014/07/02 14:21
 */
namespace Genro\Domain\Entity;

use Stringy\StaticStringy as S;

/**
 * Trait EntityTrait
 *
 * @package Genro\Domain\Entity
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait EntityTrait
{

    /**
     * Read-only access to properties.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . S::upperCamelize($name);

        if (method_exists($this, $method)) {
            return $this->{$method}();
        } elseif (property_exists($this, $name)) {
            return $this->{$name};
        }

        throw new \LogicException(
            sprintf('Not allowed to get the property. "%s::%s"', get_class($this), $name)
        );
    }

    /**
     * Read-only access to properties.
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $method = 'set' . S::upperCamelize($name);

        if (!method_exists($this, $method)) {
            throw new \LogicException(
                sprintf('Not allowed to set the property. "%s::%s"', get_class($this), $name)
            );
        }

        $this->{$method}($value);
    }
}
