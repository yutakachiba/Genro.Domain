<?php

/**
 * NaturalNumberTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:14
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait NaturalNumberTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait NaturalNumberTrait
{

    /**
     * @var int
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $value = $this->convertValue($value);
        $this->validateType($value);
        $this->validateSpec($value);
        $this->value = $value;
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
     * @return int
     */
    private function convertValue($value)
    {
        // Check the value is an int acceptable string.
        // If so, convert the string to int.
        if (is_string($value) && preg_match('/\A[0-9]{1,11}\z/', $value)) {
            return (int)$value;
        }

        return $value;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    private function validateType($value)
    {
        // Check if value is nullable and null.
        if (($this instanceof Nullable) && $value === null) {
            return true;
        }

        // Check if value is int.
        if (is_int($value) && $value >= 0) {
            return true;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid natural number value specified. $value => "%s"', $value)
        );
    }

    /**
     * @param int $value
     * @return bool
     */
    private function validateSpec($value)
    {
        return true;
    }
}
