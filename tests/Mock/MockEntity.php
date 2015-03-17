<?php

/**
 * MockEntity.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2015/02/20 3:58
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Entity\Entity;
use Genro\Domain\Entity\EntityTrait;

/**
 * Class MockEntity
 *
 * @package Genro\Domain\Mock
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 *
 * @property-read string    $name
 * @property-read string    $address
 * @property-read \DateTime $birthday
 * @property-read \DateTime $created_at
 */
class MockEntity implements Entity
{

    use EntityTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var \DateTime
     */
    private $created_at;

    public function __construct(
        $name,
        $address,
        \DateTime $birthday,
        \DateTime $created_at
    ) {

        $this->name       = $name;
        $this->address    = $address;
        $this->birthday   = $birthday;
        $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
    }
}
