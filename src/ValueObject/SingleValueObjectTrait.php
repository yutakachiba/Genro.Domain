<?php

/**
 * ValueObjectTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:11
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait SingleValueObjectTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait SingleValueObjectTrait
{

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $value = $this->convert($value);
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    abstract protected function convert($value);

    /**
     * @param mixed $value
     */
    abstract protected function validate($value);

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
