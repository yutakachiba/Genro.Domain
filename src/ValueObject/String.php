<?php

/**
 * String.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/17 0:04
 */
namespace Genro\Domain\ValueObject;

/**
 * Class String
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class String implements ValueObject, Comparable, Nullable, PdoValue
{

    /**
     * @var string
     */
    protected $value;

    /**
     * @var bool
     */
    protected $nullable = false;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $this->checkValue($value);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param ValueObject $value
     * @return bool
     */
    public function isSameValueAs(ValueObject $value)
    {
        return $this->value == $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isNullable()
    {
        return $this->nullable;
    }

    /**
     * @return bool
     */
    public function isNull()
    {
        return $this->value === null;
    }

    /**
     * @return string|null
     */
    public function asPdoValue()
    {
        return $this->isNull() ? $this->value : $this->__toString();
    }

    /**
     * @param mixed $value
     * @return string|null
     */
    protected function checkValue($value)
    {
        // Check if value is nullable and null.
        if ($this->nullable && $value === null) {
            return $value;
        }

        // Check if value is string.
        if (is_string($value)) {
            return $value;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified. $value => "%s"', gettype($value))
        );
    }
}
