<?php

/**
 * MockNullableString.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:20
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\Nullable;
use Genro\Domain\ValueObject\String;

/**
 * Class MockNullableString
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableString extends String implements Nullable
{
}
