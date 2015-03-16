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
class NaturalNumber implements ValueObject, Comparable, Nullable, PdoValue
{

    /**
     * @var int
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
        return $this->value == $value;
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
        if ($this->nullable && $value === null) {
            return $value;
        }

        // Check if value is int.
        if (is_int($value)) {
            return $value;
        }

        // Check if value is an int acceptable string.
        // If so, return int converted string as value.
        if (is_string($value)) {
            if (preg_match('/\A[0-9]{1,11}\z/', $value)) {
                return (int)$value;
            }
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified. $value => "%s"', gettype($value))
        );
    }
}
