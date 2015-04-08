<?php

/**
 * ValueObject.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/16 23:37
 */
namespace Genro\Domain\ValueObject;

/**
 * Interface ValueObject
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface ValueObject
{

    /**
     * @return ValueObject
     */
    public function getValue();

    /**
     * @param ValueObject $value
     * @return bool
     */
    public function isSameValueAs(ValueObject $value);

    /**
     * @return string
     */
    public function __toString();
}
