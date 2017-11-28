<?php
/**
 * Created by PhpStorm.
 * User: florian.flahaut
 * Date: 28/11/17
 * Time: 11:10
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\Potion;

class HealCalculator
{
    public function calculate(Player $player, Potion $potion){

        $healPoint = $player->getHealthPoint();

        if($healPoint > $potion->getHealthPoint()){
            return null;
        }

        $healPoint += $potion->getHealthPoint();

        if($healPoint+$potion->getHealthPoint() > $potion->getLimit()){
            return $potion->getLimit();
        }

        return $potion->getHealthPoint();


    }
}