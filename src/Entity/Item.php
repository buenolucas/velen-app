<?php
// src/Entity/Product.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemRepository")
 * @ORM\Table(name="item_template")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $entry;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $class;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $subclass;

    /**
    * @ORM\Column(type="string")
     */
    protected $name;


    public function getEntry()
    {
        return $this->entry;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getSubclass()
    {
        return $this->subclass;
    }

    public function setSubclass($class)
    {
        $this->subclass = $class;
    }

    // ... getter and setter methods
}