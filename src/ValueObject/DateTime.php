<?php

/**
 * DateTime.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2015/03/16 23:38
 */
namespace Genro\Domain\ValueObject;

/**
 * Class DateTime
 *
 * @package Genro\Domain\ValueObject
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTime implements ValueObject, Comparable, Nullable, PdoValue
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
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $this->checkValue($value);
    }

    /**
     * @return DateTime
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
        return $this->value->format($this->dateFormat);
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
     * @return \DateTime|null
     */
    protected function checkValue($value)
    {
        // Check if value is nullable and null.
        if ($this->nullable && $value === null) {
            return $value;
        }

        // Check if value is a \DateTime object.
        if ($value instanceof \DateTime) {
            return $value;
        }

        // Check if value is a \DateTime acceptable string.
        // If so, return a \DateTime object as value.
        if (is_string($value)) {
            try {
                return new \DateTime($value);
            } catch (\Exception $e) {
            }
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified. $value => "%s"', gettype($value))
        );
    }
}
