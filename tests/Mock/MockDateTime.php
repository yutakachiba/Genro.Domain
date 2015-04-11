<?php

/**
 * MockDateTime.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/08 12:19
 */
namespace Genro\Domain\Mock;

use Genro\Domain\ValueObject\DateTimeTrait;
use Genro\Domain\ValueObject\PdoValue;
use Genro\Domain\ValueObject\ValueObject;

/**
 * Class MockDateTime
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockDateTime implements ValueObject, PdoValue
{

    use DateTimeTrait;
}
