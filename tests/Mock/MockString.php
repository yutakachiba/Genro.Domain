<?php

/**
 * MockString.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:19
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\PdoValue;
use Genro\Domain\ValueObject\StringTrait;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockString
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockString implements ValueObject, PdoValue
{

    use StringTrait;
}
