<?php

namespace Tests\AppBundle\Factory;

use PHPUnit\Framework\TestCase;
use AppBundle\Factory\DinosaurFactory;
use AppBundle\Entity\Dinosaur;

class DinosaurFactoryTest extends TestCase
{
    /**
     * @var DinosaurFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new DinosaurFactory();
    }

    public function testItGrowsALargeVelociraptor()
    {
        //$factory = new DinosaurFactory();
        $dinosaur = $this->factory->growVelociraptor(5);
        $this->assertInstanceOf(Dinosaur::class, $dinosaur);
        $this->assertInternalType('string', $dinosaur->getGenus());
        $this->assertSame('Velociraptor', $dinosaur->getGenus());
        $this->assertSame(5, $dinosaur->getLength());
    }

    public function testItGrowsATriceraptors()
    {
        $this->markTestIncomplete('Waiting for confirmation from GenLab');
    }

    public function testItGrowsABabyVelociraptor()
    {
        if (!class_exists('Nanny')) {
            $this->markTestSkipped('There is nobody to watch the baby!');
        }
        $dinosaur = $this->factory->growVelociraptor(1);
        $this->assertSame(1, $dinosaur->getLength());
    }

}