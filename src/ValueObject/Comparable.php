<?php

/**
 * Comparable.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/17 0:34
 */
namespace Genro\Domain\ValueObject;

/**
 * Interface Comparable
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface Comparable
{

    /**
     * @param ValueObject $value
     * @return bool
     */
    public function isSameValueAs(ValueObject $value);
}
