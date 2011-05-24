<?php

namespace Cordova\MemorizeScriptureBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @var integer $id
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $name
     */
    protected $name;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     * 
     * @var DateTime $createdAt
     */
    protected $createdAt;
    
    /**
     * Gets the id.
     * 
     * @return integer The id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Gets the category name.
     * 
     * @return string The name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the category name.
     * 
     * @param string $value The name
     */
    public function setName( $value )
    {
        $this->name = $value;
    }
    
    /**
     * Gets an object representing the date and time the category was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Constructs a new instance of Category.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
}
