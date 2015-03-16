<?php

/**
 * PdoValue.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/16 23:44
 */
namespace Genro\Domain\ValueObject;

/**
 * Interface PdoValue
 *
 * @package Genro\Domain\ValueObject
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface PdoValue
{

    /**
     * @return mixed
     */
    public function asPdoValue();
}
