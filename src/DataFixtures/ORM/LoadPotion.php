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
            new Potion('small', 1, 1),
            new Potion('medium', 1, 1),
            new Potion('big', 1, 1),
            new Potion('invincible', 1, 1),
        ];

        foreach ($potions as $potion) {
            $this->addReference($potion->getName(), $potion);
            $manager->persist($potion);
        }

        $manager->flush();
    }
}
