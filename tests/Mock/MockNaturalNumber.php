<?php

/**
 * MockNaturalNumber.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:20
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\NaturalNumberTrait;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockNaturalNumber
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockNaturalNumber implements ValueObject
{

    use NaturalNumberTrait;
}
