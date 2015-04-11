<?php

/**
 * MockNullableDateTime.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/03/18 7:19
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DateTimeTrait;
use Genro\Domain\ValueObject\Nullable;
use Genro\Domain\ValueObject\PdoValue;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockNullableDateTime
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNullableDateTime implements ValueObject, Nullable, PdoValue
{

    use DateTimeTrait;
}
