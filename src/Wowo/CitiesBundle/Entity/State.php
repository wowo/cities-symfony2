<?php

namespace Wowo\CitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wowo\CitiesBundle\Entity\State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity(repositoryClass="Wowo\CitiesBundle\Entity\StateRepository")
 */
class State
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
     * @var string $shortcut
     *
     * @orm\column(name="shortcut", type="string", length=2)
     */
    private $shortcut;

    /**
     * @var string $capital
     *
     * @orm\column(name="capital", type="string", length=255)
     */
    private $capital;

    /**
     * @var integer $population
     *
     * @ORM\Column(name="population", type="integer")
     */
    private $population;

    /**
     * @var ArrayCollection<City> $cities 
     * 
     * @ORM\OneToMany(targetEntity="City", mappedBy="state")
     */
    private $cities;


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
     * Set shortcut
     *
     * @param string $shortcut
     */
    public function setShortcut($shortcut)
    {
        $this->shortcut = $shortcut;
    }

    /**
     * Get shortcut
     *
     * @return string 
     */
    public function getShortcut()
    {
        return $this->shortcut;
    }

    /**
     * Set capital
     *
     * @param string $capital
     */
    public function setCapital($capital)
    {
        $this->capital= $capital;
    }

    /**
     * Get capital
     *
     * @return string 
     */
    public function getCapital()
    {
        return $this->capital;
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
}
