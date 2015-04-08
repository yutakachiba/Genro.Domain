<?php

/**
 * MockNullableDecimal.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:18
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DecimalTrait;
use Genro\Domain\ValueObject\Nullable;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockNullableDecimal
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableDecimal implements ValueObject, Nullable
{

    use DecimalTrait;
}
