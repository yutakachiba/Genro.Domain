<?php

/**
 * RepositoryInterface.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/02/19 17:03
 */
namespace Genro\Domain\Repository;

use Genro\Domain\Entity\EntityInterface;

/**
 * Interface RepositoryInterface
 *
 * @package Genro\Domain\Repository
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface RepositoryInterface
{

    /**
     * @param EntityInterface $entity
     * @return mixed
     */
    public function add(EntityInterface $entity);

    /**
     * @param EntityInterface $entity
     * @return mixed
     */
    public function update(EntityInterface $entity);

    /**
     * @param EntityInterface $entity
     * @return mixed
     */
    public function remove(EntityInterface $entity);
}
