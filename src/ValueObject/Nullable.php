<?php

/**
 * Nullable.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 6:41
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
    public function isNull();
}
