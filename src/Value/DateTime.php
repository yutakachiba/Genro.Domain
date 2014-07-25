<?php

/**
 * DateTime.php
 *
 * @copyright Yutaka Chiba <yutakachiba@gmail.com>
 * @created 2014/07/02 15:13
 */
namespace Genro\Domain\Value;

/**
 * Class DateTime
 *
 * @package Genro\Domain\Value
 * @author  Yutaka Chiba <yutakachiba@gmail.com>
 */
class DateTime implements ValueInterface, \ArrayAccess
{

    use ValueTrait;

    /**
     * @var \DateTime
     */
    private $value;

    /**
     * @var \DateTimeZone
     */
    private $timezone;

    /**
     * @var string
     */
    private $format;

    /**
     * @param mixed $value
     * @param array $options
     * @throws \InvalidArgumentException
     */
    public function __construct($value = null, array $options = [])
    {
        if ($value === null) {

            $value = new \DateTime();

        } else {

            if ($value instanceof \DateTimeInterface) {
                if (!isset($options['timezone'])) {
                    $options['timezone'] = $value->getTimezone();
                }
            } else if (is_int($value) || ctype_digit($value)) {
                $value = new \DateTime(sprintf('@%d', $value));
            } else if (is_string($value)) {
                $value = new \DateTime($value);
            }

//            if (($value instanceof \DateTimeInterface) === false) {
            if (($value instanceof \DateTime) === false) {
                throw new \InvalidArgumentException(
                    sprintf('Invalid type: %s.',
                        (is_object($value)) ? get_class($value) : gettype($value)
                    )
                );
            }
        }

        if (!isset($options['timezone'])) {

            $options['timezone'] = new \DateTimeZone(date_default_timezone_get());

        } else {

            if (is_string($options['timezone'])) {
                $options['timezone'] = new \DateTimeZone($options['timezone']);
            }

            if (($options['timezone'] instanceof \DateTimeZone) === false) {
                throw new \InvalidArgumentException(
                    sprintf('Invalid type: %s.',
                        (is_object($options['timezone'])) ? get_class($options['timezone']) : gettype($options['timezone'])
                    )
                );
            }

        }

        if ($value instanceof \DateTimeImmutable) {
            $value = $value->setTimezone($options['timezone']);
        } else {
            $value->setTimezone($options['timezone']);
        }

        if (!isset($options['format'])) {
            $options['format'] = 'Y-m-d H:i:s';
        }

        $this->initialize($value, $options);
    }

    /**
     * @return \DateTime|mixed
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
        return $this->value->format($this->format);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->value, $name)) {
            return call_user_func_array([$this->value, $name], $arguments);
        }

        throw new \BadMethodCallException(
            sprintf('Undefined method "%s" called.', $name)
        );
    }

    /**
     * @param \DateTimeZone $timezone
     */
    private function setTimezone(\DateTimeZone $timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return (int)$this->value->format('Y');
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return (int)$this->value->format('m');
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return (int)$this->value->format('d');
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return (int)$this->value->format('H');
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return (int)$this->value->format('i');
    }

    /**
     * @return int
     */
    public function getSecond()
    {
        return (int)$this->value->format('s');
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return (int)$this->value->format('U');
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getLastDay()
    {
        return (int)$this->value->format('t');
    }
}
