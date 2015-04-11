<?php

/**
 * NaturalNumberTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 11:14
 */
namespace Genro\Domain\ValueObject;

use ValueObjects\Null\Null;
use ValueObjects\Number\Natural;

/**
 * Trait NaturalNumberTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait NaturalNumberTrait
{

    /**
     * @var Natural|Null
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        if ($this instanceof Nullable && $value === null) {
            $this->value = Null::create();
        } else {
            $this->value = Natural::fromNative($value);
        }
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
            $value->toNative() === $this->toNative()
        );
    }

    /**
     * @return int|null
     */
    public function toNative()
    {
        if ($this->isNull()) {
            return null;
        } else {
            return $this->value->toNative();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @return string|null
     */
    public function asPdoValue()
    {
        return $this->isNull() ? null : $this->toNative();
    }
}
