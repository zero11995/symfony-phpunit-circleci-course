<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="securities")
 */
class Security
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enclosure", inversedBy="securities")
     */
    private $enclosure;

    public function __construct(string $name, bool $isActive, Enclosure $enclosure)
    {
        $this->name = $name;
        $this->isActive = $isActive;
        $this->enclosure = $enclosure;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Enclosure
     */
    public function getEnclosure()
    {
        return $this->enclosure;
    }

    /**
     * @param Enclosure $enclosure
     */
    public function setEnclosure(Enclosure $enclosure)
    {
        $this->enclosure = $enclosure;
    }


}
