<?php

namespace Wowo\CitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wowo\CitiesBundle\Entity\City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="Wowo\CitiesBundle\Entity\CityRepository")
 */
class City
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $rank
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    /**
     * @var State $state
     *
     * @ORM\ManyToOne(targetEntity="State", inversedBy="cities")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /**
     * @var integer $population
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;

    /**
     * @var decimal $land_area
     *
     * @ORM\Column(name="land_area", type="decimal")
     */
    private $land_area;

    /**
     * @var decimal $population_density
     *
     * @ORM\Column(name="population_density", type="decimal")
     */
    private $population_density;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set state
     *
     * @param integer $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set population
     *
     * @param integer $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set land_area
     *
     * @param decimal $landArea
     */
    public function setLandArea($landArea)
    {
        $this->land_area = $landArea;
    }

    /**
     * Get land_area
     *
     * @return decimal 
     */
    public function getLandArea()
    {
        return $this->land_area;
    }

    /**
     * Set population_density
     *
     * @param decimal $populationDensity
     */
    public function setPopulationDensity($populationDensity)
    {
        $this->population_density = $populationDensity;
    }

    /**
     * Get population_density
     *
     * @return decimal 
     */
    public function getPopulationDensity()
    {
        return $this->population_density;
    }
}
