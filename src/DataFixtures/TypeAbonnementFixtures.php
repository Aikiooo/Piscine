<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TypeAbonnement;
use App\Repository\TypeAbonnementRepository;

class TypeAbonnementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $type1 = new TypeAbonnement();
        $type1->setNom("Individuel");

        $type2 = new TypeAbonnement();
        $type2->setNom("10 entrées");

        $type3 = new TypeAbonnement();
        $type3->setNom("Duo");

        $manager->persist($type1);
        $manager->flush($type1);
        $manager->persist($type2);
        $manager->flush($type2);
        $manager->persist($type3);
        $manager->flush($type3);
    }
}
