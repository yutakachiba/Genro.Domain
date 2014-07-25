<?php

/**
 * ChildEntity.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/21 18:03
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Entity\EntityInterface;
use Genro\Domain\Entity\EntityTrait;

/**
 * Class ChildEntity
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class ChildEntity implements EntityInterface
{

    use EntityTrait;

    /**
     * @var int
     */
    private $childId;

    /**
     * @var string
     */
    private $image01;

    /**
     * @var string
     */
    private $image02;

    /**
     * @var string
     */
    private $image03;
}
