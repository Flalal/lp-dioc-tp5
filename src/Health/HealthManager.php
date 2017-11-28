<?php
/**
 * Created by PhpStorm.
 * User: florian.flahaut
 * Date: 28/11/17
 * Time: 10:59
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\PlayerPotion;
use App\Entity\Potion;

class HealthManager
{

    private $healCalculator;

    public function __construct()
    {
        $this->healCalculator = new HealCalculator();
    }


    public function heal(Health $health)
    {
        /** @var \App\Entity\Player $player */
        $player = $health->player;
        /** @var \App\Entity\Potion $potion */
        $potion = $health->potion;
        $count = $health->count;

        $playerPotion = $this->getPlayerPotion($player, $potion);
        if ($playerPotion->getCount() < $count) {
            return;
        }

        for ($i = 0; $i < $count; $i++) {
            $newHP = $this->healCalculator->calculate($player, $potion);

            if (null == $newHP) {
                return;
            }

            $player->setHealthPoint($player->getHealthPoint() + $newHP);

        }

    }

    private function getPlayerPotion(Player $player, Potion $potion): PlayerPotion
    {
        /** @var \App\Entity\PlayerPotion $pp */
        foreach ($player->getPlayerPotions() as $pp) {
            if ($pp->getPotion() === $potion) {
                return $pp;
            }
        }

        throw new \LogicException();
    }

    private function calculate($healPoint, Potion $potion, int $count) : ?int
    {
        if ($healPoint > $potion->getLimit()) {
            return null;
        }

        $healPoint += $potion->getHealthPoint();

        if ($healPoint > $potion->getLimit()) {
            return $potion->getLimit();
        }


    }
}