<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Player
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthPoint = 100;

    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    private $currentWeapon;

    /**
     * @ORM\OneToMany(targetEntity="PlayerPotion", mappedBy="player", cascade={"persist"})
     */
    private $playerPotions;


    public function addPlayerPotion(PlayerPotion $playerPotion){
        if($this->playerPotions->contains($playerPotion)){
            return;
        }
        $this->playerPotions->add($playerPotion);
        $playerPotion->setPlayer($this);
    }

    /**
     * Player constructor.
     * @param $potion
     */
    public function __construct()
    {
        $this->playerPotions = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPlayerPotions()
    {
        return $this->playerPotions;
    }

    /**
     * @param mixed $playerPotions
     */
    public function setPlayerPotions($playerPotions)
    {
        $this->playerPotions = $playerPotions;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    public function getCurrentWeapon(): ?Weapon
    {
        return $this->currentWeapon;
    }

    public function setCurrentWeapon(?Weapon $currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }

}