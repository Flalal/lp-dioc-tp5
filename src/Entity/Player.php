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
     * @ORM\ManyToMany(targetEntity="Potion")
     */
    private $potions;

    /**
     * Player constructor.
     * @param $potion
     */
    public function __construct()
    {
        $this->potions = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getPotions(): Collection
    {
        return $this->potions;
    }

    /**
     * @param mixed $potions
     */
    public function setPotions($potions)
    {
        $this->potions = $potions;
    }

    public function addPotion(Potion $potion){
        $this->potions->add($potion);
    }

    public function removePotion(Potion $potion){
        $this->potions->removeElement($potion);
    }

}