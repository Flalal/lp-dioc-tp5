<?php
/**
 * Created by PhpStorm.
 * User: florian.flahaut
 * Date: 28/11/17
 * Time: 10:15
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PlayerPotion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $count;
    /**
     * @ORM\ManyToOne(targetEntity="Potion")
     */
    private $potion;
    /**
     * @ORM\ManyToOne(targetEntity="Player",inversedBy="playerPotions")
     */
    private $player;

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getPotion()
    {
        return $this->potion;
    }

    /**
     * @param mixed $potion
     */
    public function setPotion($potion)
    {
        $this->potion = $potion;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }



}