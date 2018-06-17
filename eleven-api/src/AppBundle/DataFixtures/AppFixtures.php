<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Astronaute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // création d'astronaute avec des valeurs saisie pour les générer en base de données
        $astronaute1 = new Astronaute();
        $astronaute1->setNom('Pesquet');
        $astronaute1->setPrenom('Thomas');
        $astronaute1->setAge('40');

        $astronaute2 = new Astronaute();
        $astronaute2->setNom('Haigneré');
        $astronaute2->setPrenom('Claudie');
        $astronaute2->setAge('61');

        $astronaute3 = new Astronaute();
        $astronaute3->setNom('Acaba');
        $astronaute3->setPrenom('Joseph');
        $astronaute3->setAge('51');

        $manager->persist($astronaute1);
        $manager->persist($astronaute2);
        $manager->persist($astronaute3);

        $manager->flush();
    }
}
