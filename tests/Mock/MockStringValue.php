<?php

/**
 * MockStringValue.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 4:06
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\SingleValueObjectTrait;
use Genro\Domain\ValueObject\StringTrait;
use Genro\Domain\ValueObject\ValueObjectInterface;

/**
 * Class MockStringValue
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockStringValue implements ValueObjectInterface
{

    use SingleValueObjectTrait;
    use StringTrait;
}
