<?php

//namespace Vendor\FirstBundle\Entity;
namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\BibleRepository")
 * @orm:Table(name="bible")
 */
class Bible
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
     * @var string $version
     */
    protected $version;
      
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
     * Gets the version.
     * 
     * @return string version
     */
    public function getVersion()
    {
        return $this->version;
    }
    
    /**
     * Sets the version.
     * 
     * @param string $value version
     */
    public function setVersion( $value )
    {
        $this->version = $value;
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
