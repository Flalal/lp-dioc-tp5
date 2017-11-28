<?php

namespace App\DataFixtures\ORM;

use App\Entity\Potion;
use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPotion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $potions = [
            new Potion('s', 25, 75),
            new Potion('m', 50, 75),
            new Potion('l', 75, 100),
            new Potion('ultra', 100, 100),
        ];

        foreach ($potions as $potion) {
            $this->addReference($potion->getName(), $potion);
            $manager->persist($potion);
        }

        $manager->flush();
    }
}
