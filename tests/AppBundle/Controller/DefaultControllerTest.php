<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\LoadBasicParkData;
use AppBundle\DataFixtures\ORM\LoadSecurityData;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class DefaultControllerTest extends WebTestCase
{
    use FixturesTrait;

    public function testEnclosuresAreShownOnHomepage()
    {

        $this->loadFixtures([
            LoadBasicParkData::class,
            LoadSecurityData::class,
        ]);

        $client = $this->makeClient();
        $crawler = $client->request('GET', '/');
        $this->assertStatusCode(200, $client);

        $table = $crawler->filter('.table-enclosures');
        $this->assertCount(3, $table->filter('tbody tr'));
    }

    public function testThatThereIsAnAlarmButtonWithoutSecurity()
    {
        $fixtures = $this->loadFixtures([
            LoadBasicParkData::class,
            LoadSecurityData::class,
        ])->getReferenceRepository();

        $client = $this->makeClient();
        $crawler = $client->request('GET', '/');

        $enclosure = $fixtures->getReference('carnivorous-enclosure');
        $selector = sprintf('#enclosure-%s .button-alarm', $enclosure->getId());

        $this->assertGreaterThan(0, $crawler->filter($selector)->count());
    }

}