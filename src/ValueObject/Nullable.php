<?php

/**
 * Nullable.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/16 23:41
 */
namespace Genro\Domain\ValueObject;

/**
 * Interface Nullable
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface Nullable
{

    /**
     * @return bool
     */
    public function isNullable();

    /**
     * @return bool
     */
    public function isNull();
}
