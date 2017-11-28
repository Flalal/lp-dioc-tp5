<?php
/**
 * Created by PhpStorm.
 * User: florian.flahaut
 * Date: 28/11/17
 * Time: 08:42
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Potion
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
    private $healthPoint;
    /**
     * @ORM\Column(name="limit_hp",type="integer")
     */
    private $limit;

    /**
     * Potion constructor.
     * @param $name
     * @param $healthPoint
     * @param $limitHealth
     */
    public function __construct($name, $healthPoint, $limit)
    {
        $this->name = $name;
        $this->healthPoint = $healthPoint;
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    /**
     * @param mixed $healthPoint
     */
    public function setHealthPoint($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    /**
     * @return mixed
     */
    public function getLimitHealth()
    {
        return $this->$limitHealth;
    }

    /**
     * @param mixed $limit
     */
    public function setLimitHealth($limitHealth)
    {
        $this->$limitHealth = $limitHealth;
    }



}