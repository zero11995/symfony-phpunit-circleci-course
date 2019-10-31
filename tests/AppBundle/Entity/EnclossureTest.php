<?php

namespace Tests\AppBundle\Entity;

class EnclossureTest
{
    public function testItHasNoDinosaursByDefault()
    {
        $enclosure = new Enclosure();
        $this->assertCount(0, $enclosure->getDinosaurs());
    }
}