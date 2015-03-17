<?php

/**
 * MockNullableNaturalNumber.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:19
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\NaturalNumber;
use Genro\Domain\ValueObject\Nullable;

/**
 * Class MockNullableNaturalNumber
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableNaturalNumber extends NaturalNumber implements Nullable
{
}
