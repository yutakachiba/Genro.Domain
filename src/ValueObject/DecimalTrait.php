<?php

/**
 * DecimalTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:43
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait DecimalTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait DecimalTrait
{

    /**
     * @var string
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
     * @return string|null
     */
    public function asPdoValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return string
     */
    private function convertValue($value)
    {
        if (is_int($value) || is_double($value)) {
            return (string)$value;
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

        // Check if value is decimal.
        // Check the value is an int acceptable string.
        if (is_string($value)) {
            return true;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid decimal value specified. $value => "%s"', $value)
        );
    }

    /**
     * @param string $value
     * @return bool
     */
    private function validateSpec($value)
    {
        return true;
    }
}
