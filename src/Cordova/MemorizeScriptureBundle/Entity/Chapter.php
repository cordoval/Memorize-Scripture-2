<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\ChapterRepository")
 * @orm:Table(name="chapter")
 */
class Chapter
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
     * @var string $chapternum
     */
    protected $chapternum;
      
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
     * Gets the chapternum.
     * 
     * @return string chapternum
     */
    public function getChapternum()
    {
        return $this->chapternum;
    }
    
    /**
     * Sets the chapternum.
     * 
     * @param string $value chapternum
     */
    public function setChapternum( $value )
    {
        $this->chapternum = $value;
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
