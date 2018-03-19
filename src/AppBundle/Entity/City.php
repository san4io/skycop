<?php

namespace AppBundle\Entity;

/**
 * Class City
 * @package AppBundle\Entity
 */
class City
{
    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $name;

    /**
     * City constructor.
     * @param string $country
     * @param string $name
     */
    public function __construct($country, $name)
    {
        $this->country = $country;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}