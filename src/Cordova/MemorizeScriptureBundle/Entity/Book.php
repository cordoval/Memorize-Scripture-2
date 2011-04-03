<?php

//namespace Vendor\FirstBundle\Entity;
namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\BookRepository")
 * @orm:Table(name="book")
 */
class Book
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     * 
     * @var integer $id
     */
    protected $id;
       
    /**
     * @orm:Column(type="text")
     * 
     * @var string $title
     */
    protected $title;
      
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
     * Gets the title.
     * 
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title.
     * 
     * @param string $value title
     */
    public function setTitle( $value )
    {
        $this->title = $value;
    }
       
    /**
     * Constructs a new instance of Bible
     */
    public function __construct()
    {
    }
    
    /**
     * Invoked before the entity is updated.
     * 
     * @orm:PreUpdate
     */
    public function preUpdate()
    {
    }
}
