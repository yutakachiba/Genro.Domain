<?php

/**
 * Repository.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 17:03
 */
namespace Genro\Domain\Repository;

use Genro\Domain\Entity\Entity;

/**
 * Interface Repository
 *
 * @package Genro\Domain\Repository
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface Repository
{

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function add(Entity $entity);

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function update(Entity $entity);

    /**
     * @param Entity $entity
     * @return mixed
     */
    public function remove(Entity $entity);
}
