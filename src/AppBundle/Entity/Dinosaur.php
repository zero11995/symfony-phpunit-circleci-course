<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{

    const LARGE=10;
    const HUGE=30;

    /**
     * @ORM\Column(type="integer")
     */
    private $length = 0;

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $genus;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isCarnivorous;


    public function __construct(string $genus = 'Unknown', bool $isCarnivorous = false)
    {
        $this->genus = $genus;
        $this->isCarnivorous = $isCarnivorous;
    }


    /**
     * @param int $length
     */
    public function setLength(int $length)
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * @param string $genus
     */
    public function setGenus(string $genus)
    {
        $this->genus = $genus;
    }

    public function getSpecification(): string
    {
        return sprintf(
            'The %s %s dinosaur is %d meters long',
            $this->genus,
            $this->isCarnivorous ? 'carnivorous' : 'non-carnivorous',
            $this->length
        );
    }

    public function isCarnivorous(): bool
    {
        return $this->isCarnivorous;
    }

}
