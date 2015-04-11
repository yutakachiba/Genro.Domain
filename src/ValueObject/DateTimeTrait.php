<?php

/**
 * DateTimeTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:12
 */
namespace Genro\Domain\ValueObject;

use ValueObjects\DateTime\DateTime;
use ValueObjects\Null\Null;

/**
 * Trait DateTimeTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait DateTimeTrait
{

    /**
     * @var DateTime|Null
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
        if ($this instanceof Nullable && $value === null) {
            $this->value = Null::create();
            return;
        }

        if ($value instanceof \DateTime) {
            $this->value = DateTime::fromNativeDateTime($value);
            return;
        }

        if (is_string($value)) {
            try {
                $this->value = DateTime::fromNativeDateTime(new \DateTime($value));
                return;
            } catch (\Exception $e) {
            }
        }

        throw new \InvalidArgumentException(
            sprintf('Invalid DateTime value specified.')
        );
    }

    /**
     * @return bool
     */
    public function isNull()
    {
        return $this->value instanceof Null;
    }

    /**
     * @param ValueObject $value
     * @return bool
     */
    public function sameValueAs(ValueObject $value)
    {
        return (
            get_class($value) === get_class($this) &&
            $value->toNative() == $this->toNative()
        );
    }

    /**
     * @return \DateTime|null
     */
    public function toNative()
    {
        if ($this->isNull()) {
            return null;
        }

        return $this->value->toNativeDateTime();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->isNull()) {
            return $this->value->__toString();
        }

        $dateTime = $this->value->toNativeDateTime();
        return $dateTime->format($this->dateFormat);
    }

    /**
     * @return string|null
     */
    public function asPdoValue()
    {
        return $this->isNull() ? null : $this->__toString();
    }
}
