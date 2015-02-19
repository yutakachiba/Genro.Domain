<?php

/**
 * NullableSingleValueObjectTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 5:42
 */
namespace Genro\Domain\ValueObject;

/**
 * Trait NullableSingleValueObjectTrait
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait NullableSingleValueObjectTrait
{

    use SingleValueObjectTrait;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        if ($value !== null) {
            $value = $this->convert($value);
            $this->validate($value);
        }

        $this->value = $value;
    }
}
