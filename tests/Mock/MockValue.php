<?php

/**
 * MockValue.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/22 16:02
 */
namespace Genro\Domain\Mock;

use Genro\Domain\Value\ValueInterface;
use Genro\Domain\Value\ValueTrait;

/**
 * Class MockValue
 *
 * @package Genro\Domain\Mock
 * @author Yutaka Chiba <yutakachiba@gmail.com>
 */
class MockValue implements ValueInterface
{

    use ValueTrait;

    /**
     * @var object
     */
    private $value;

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $osVersion;

    /**
     * @var string
     */
    private $browser;

    /**
     * @var string
     */
    private $browserVersion;

    /**
     * @return object
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value->userAgent;
    }

    /**
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }
}
