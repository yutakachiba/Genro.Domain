<?php

/**
 * DateTimeTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:20
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait DateTimeTrait
 *
 * Use this trait with SingleValueObjectTrait.
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 * @see Genro\Domain\ValueObject\SingleValueObjectTrait
 *
 * @property-read \DateTime $value
 */
trait DateTimeTrait
{

    /**
     * @param mixed $value
     * @return \DateTime|mixed
     */
    protected function convert($value)
    {
        if (is_string($value)) {
            $value = new \DateTime($value);
        }

        return $value;
    }

    /**
     * @param \DateTime $value
     */
    protected function validate($value)
    {
        if (!($value instanceof \DateTime)) {
            throw new \InvalidArgumentException(
                sprintf('Argument must be a \DateTime or "Y-m-d H:i:s" format string. "%s" given.', gettype($value))
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
        $a = $this->getValue();
        $b = $value->getValue();
        return ($a->format('Y-m-d H:i:s') === $b->format('Y-m-d H:i:s'));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return ($this->value instanceof \DateTime)
            ? $this->value->format('Y-m-d H:i:s')
            : '';

    }
}
