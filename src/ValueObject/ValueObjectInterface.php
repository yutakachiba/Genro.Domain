<?php

/**
 * ValueObjectInterface.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 16:57
 */
namespace Genro\Domain\ValueObject;

/**
 * Interface ValueObjectInterface
 *
 * @package Genro\Domain\ValueObject\String
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface ValueObjectInterface
{

    /**
     * @param ValueObjectInterface $value
     * @return bool
     */
    public function isSameValueAs(ValueObjectInterface $value);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function __toString();
}
