<?php

namespace tests\AppBundle\Entity;

use AppBundle\Entity\Astronaute;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AstronauteEntityTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    private $em;

    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testGetterAndSetter()
    {
        $astronaute = $this->em
            ->getRepository(Astronaute::class)
            ->find(1);
        ;

        $this->assertEquals(1, $astronaute->getId());
        $this->assertNotNull($astronaute->getNom());
        $this->assertNotNull($astronaute->getPrenom());
        $this->assertNotNull($astronaute->getAge());
    }
}