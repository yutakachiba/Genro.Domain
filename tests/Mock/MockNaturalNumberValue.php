<?php

/**
 * MockNaturalNumberValue.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:05
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\NaturalNumberTrait;
use Genro\Domain\ValueObject\SingleValueObjectTrait;
use Genro\Domain\ValueObject\ValueObjectInterface;

/**
 * Class MockNaturalNumberValue
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNaturalNumberValue implements ValueObjectInterface
{

    use SingleValueObjectTrait;
    use NaturalNumberTrait;
}
