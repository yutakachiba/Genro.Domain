<?php

/**
 * MockDecimal.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:20
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DecimalTrait;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockDecimal
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockDecimal implements ValueObject
{

    use DecimalTrait;
}
