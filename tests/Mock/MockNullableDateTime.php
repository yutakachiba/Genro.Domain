<?php

/**
 * MockNullableDateTime.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:19
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DateTime;
use Genro\Domain\ValueObject\Nullable;

/**
 * Class MockNullableDateTime
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableDateTime extends DateTime implements Nullable
{
}
