<?php

/**
 * MockCollection.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/20 3:57
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Collection\CollectionInterface;
use Genro\Domain\Collection\CollectionTrait;

/**
 * Class MockCollection
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockCollection implements CollectionInterface
{

    use CollectionTrait;
}
