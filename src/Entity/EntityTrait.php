<?php

/**
 * EntityTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/15 15:43
 */
namespace Genro\Domain\Entity;

use Doctrine\Common\Inflector\Inflector;

/**
 * Trait EntityTrait
 *
 * @package Genro\Domain\Entity
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait EntityTrait
{

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $name => $value) {
            $property = Inflector::camelize($name);
            $this->{$property} = $value;
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $property = Inflector::camelize($name);

        throw new \RuntimeException(
            sprintf('property not found. "%s"', $property)
        );
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $property = Inflector::camelize($name);

        throw new \RuntimeException(
            sprintf('property not found. "%s"', $property)
        );
    }
}
