<?php

/**
 * StringTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:13
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait StringTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait StringTrait
{

    /**
     * @var string|null
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
     * @return string|null
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
        return $this->getValue() === $value->getValue();
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
        return $this->isNull() ? $this->value : $this->__toString();
    }

    /**
     * @param mixed $value
     * @return string
     */
    private function convertValue($value)
    {
        if (is_int($value)) {
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

        // Check if value is a string.
        if (is_string($value)) {
            return true;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid string value specified. $value => "%s"', $value)
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
