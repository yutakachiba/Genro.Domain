<?php

/**
 * NaturalNumberTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:17
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait NaturalNumberTrait
 *
 * Use this trait with SingleValueObjectTrait.
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 * @see Genro\Domain\ValueObject\SingleValueObjectTrait
 *
 * @property-read int $value
 */
trait NaturalNumberTrait
{

    /**
     * @param mixed $value
     * @return int|mixed
     */
    protected function convert($value)
    {
        if (is_string($value)) {
            $value = (int)$value;
        }

        return $value;
    }

    /**
     * @param int $value
     */
    protected function validate($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException(
                sprintf('Argument must be an integer. "%s" given.', gettype($value))
            );
        }
        if (!preg_match('/\A[0-9]+\z/', $value)) {
            throw new \InvalidArgumentException(
                sprintf('Argument must contain letters only 0-9. "%s" given.', $value)
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
