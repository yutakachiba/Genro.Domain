<?php

/**
 * StringTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:10
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait StringTrait
 *
 * Use this trait with SingleValueObjectTrait.
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 * @see Genro\Domain\ValueObject\SingleValueObjectTrait
 *
 * @property-read string $value
 */
trait StringTrait
{

    /**
     * @param mixed $value
     * @return mixed|string
     */
    protected function convert($value)
    {
        if (is_int($value)) {
            $value = (string)$value;
        }

        return $value;
    }

    /**
     * @param string $value
     */
    protected function validate($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException(
                sprintf('Argument must be a string. "%s" given.', gettype($value))
            );
        }
    }

    /**
     * @param ValueObjectInterface $value
     * @return bool
     */
    public function isSameValueAs(ValueObjectInterface $value)
    {
        /** @var ValueObjectInterface $this */
        return ($this->getValue() === $value->getValue());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }
}
