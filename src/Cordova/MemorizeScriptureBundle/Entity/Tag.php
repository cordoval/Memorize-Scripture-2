<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

/**
 * @orm:Entity
 * @orm:Table(name="tag")
 */
class Tag
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
     * @orm:Column(type="string", length="255")
     * 
     * @var string $name;
     */
    protected $name;

    /**
     * @orm:Column(type="datetime", name="created_at")
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
     * Gets the name of the tag.
     * 
     * @return string The name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name of the tag.
     * 
     * @param string $value The name
     */
    public function setName( $value )
    {
        $this->name = $value;
    }
    
    /**
     * Gets an object representing the date and time the tag was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Constructs a new instance of Tag.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
}
