<?php

/**
 * NaturalNumber.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/17 0:10
 */
namespace Genro\Domain\ValueObject;

/**
 * Class NaturalNumber
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class NaturalNumber implements ValueObject, Comparable, PdoValue
{

    /**
     * @var int
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $this->checkValue($value);
    }

    /**
     * @return int
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
        return ($this->getValue() === $value->getValue());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @return bool
     */
    public function isNull()
    {
        return $this->value === null;
    }

    /**
     * @return int|null
     */
    public function asPdoValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return int|null
     */
    protected function checkValue($value)
    {
        // Check if value is nullable and null.
        if (($this instanceof Nullable) && $value === null) {
            return $value;
        }

        // Check if value is int.
        if (is_int($value) && $value >= 0) {
            return $value;
        }

        // Check if value is an int acceptable string.
        // If so, convert string to int and return it as value.
        if (is_string($value) && preg_match('/\A[0-9]{1,11}\z/', $value)) {
            return (int)$value;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified. $value => "%s"', gettype($value))
        );
    }
}
