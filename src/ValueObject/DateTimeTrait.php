<?php

/**
 * DateTimeTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:12
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait DateTimeTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait DateTimeTrait
{

    /**
     * @var \DateTime|null
     */
    private $value;

    /**
     * @var string
     */
    private $dateFormat = 'Y-m-d H:i:s';

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
     * @return \DateTime|null
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
        // use == for object compare.
        return ($this->getValue() == $value->getValue());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->isNull() ? '' : $this->value->format($this->dateFormat);
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
     * @return \DateTime
     */
    private function convertValue($value)
    {
        // Check if value is a \DateTime acceptable string.
        // If so, convert string to \DateTime and return it as value.
        if (is_string($value)) {
            try {
                return new \DateTime($value);
            } catch (\Exception $e) {
            }
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

        // Check if value is a \DateTime object.
        if ($value instanceof \DateTime) {
            return true;
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified. $value => "%s"', $value)
        );
    }

    /**
     * @param \DateTime $value
     * @return bool
     */
    private function validateSpec($value)
    {
        return true;
    }
}
