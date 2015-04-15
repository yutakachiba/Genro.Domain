<?php

/**
 * CollectionTrait.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2015/04/15 15:59
 */
namespace Genro\Domain\Collection;

/**
 * Trait CollectionTrait
 *
 * @package Genro\Domain\Collection
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
trait CollectionTrait
{

    /**
     * @param Collection $anotherCollection
     * @return Collection
     */
    public function diff(Collection $anotherCollection)
    {
        /** @var Collection $this */
        return new static(
            array_diff($this->toArray(), $anotherCollection->toArray())
        );
    }
}
