<?php

/**
 * MockEntity.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created   2015/02/20 3:58
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Entity\EntityInterface;
use Genro\Domain\Entity\EntityTrait;

/**
 * Class MockEntity
 *
 * @package Genro\Domain\Mock
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 *
 * @property-read string $name
 * @property-read string $address
 * @property-read \DateTime $birthday
 */
class MockEntity implements EntityInterface
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

    public function __construct(
        $name,
        $address,
        \DateTime $birthday
    ) {

        $this->name     = $name;
        $this->address  = $address;
        $this->birthday = $birthday;
    }

    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
    }
}
