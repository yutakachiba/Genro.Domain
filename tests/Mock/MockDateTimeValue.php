<?php

/**
 * MockDateTimeValue.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:02
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DateTimeTrait;
use Genro\Domain\ValueObject\NullableSingleValueObjectTrait;
use Genro\Domain\ValueObject\ValueObjectInterface;

/**
 * Class MockDateTimeValue
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockDateTimeValue implements ValueObjectInterface
{

    use NullableSingleValueObjectTrait;
    use DateTimeTrait;
}
