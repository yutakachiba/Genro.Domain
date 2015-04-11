<?php

/**
 * MockNullableString.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:20
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\Nullable;
use Genro\Domain\ValueObject\PdoValue;
use Genro\Domain\ValueObject\StringTrait;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockNullableString
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableString implements ValueObject, Nullable, PdoValue
{

    use StringTrait;
}
