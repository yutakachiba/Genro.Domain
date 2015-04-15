<?php

/**
 * Collection.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/15 15:55
 */
namespace Genro\Domain\Collection;

/**
 * Interface Collection
 *
 * @package Genro\Domain\Collection
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
interface Collection
{

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param Collection $anotherCollection
     * @return Collection
     */
    public function diff(Collection $anotherCollection);
}
