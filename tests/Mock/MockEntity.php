<?php

/**
 * MockEntity.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/21 18:01
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Entity\EntityInterface;
use Genro\Domain\Entity\EntityTrait;

/**
 * Class MockEntity
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockEntity implements EntityInterface
{

    use EntityTrait;

    /**
     * @var int
     */
    private $mockId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Genro\Domain\Value\DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $body;

    /**
     * @var ChildEntity
     */
    private $childEntity;

    /**
     * @param ChildEntity $childEntity
     */
    public function setChildEntity(ChildEntity $childEntity)
    {
        $this->childEntity = $childEntity;
    }

    /**
     * @return ChildEntity
     */
    public function getChildEntity()
    {
        return $this->childEntity;
    }
}
