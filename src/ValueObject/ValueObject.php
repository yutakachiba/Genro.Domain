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
    public function toNative();

    /**
     * @param ValueObject $value
     * @return bool
     */
    public function sameValueAs(ValueObject $value);

    /**
     * @return string
     */
    public function __toString();
}
