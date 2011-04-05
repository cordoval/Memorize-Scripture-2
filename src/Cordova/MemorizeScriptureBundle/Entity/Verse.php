<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\VerseRepository")
 * @orm:Table(name="verse")
 */
class Verse
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
     * @orm:OneToMany(targetEntity="SessionVerse", mappedBy="verse")
     * @orm:OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $sessionverses
     */
    private $sessionverses;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $versenum
     */
    protected $versenum;

    /**
     * Gets the sessionverses of the verse.
     *
     * @return ArrayCollection $sessionverses
     */
    public function getSessionVerses()
    {
        return $this->sessionverses;
    }

    /**
     * Sets the verse sessionverses.
     *
     * @param SessionVerse $value sessionverse
     */
    public function addSessionVerse( $value )
    {
        $value->setVerse($this);
        $this->sessionverses->add($value);
    }

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
     * Gets the versernum.
     * 
     * @return string versernum
     */
    public function getVersenum()
    {
        return $this->versenum;
    }
    
    /**
     * Sets the versenum.
     * 
     * @param string $value versenum
     */
    public function setVersenum( $value )
    {
        $this->versenum = $value;
    }

    /**
     * @orm:Column(type="text")
     * 
     * @var string $versetext
     */
    protected $versetext;
      

    /**
     * Gets the versetext.
     * 
     * @return string versetext
     */
    public function getVersetext()
    {
        return $this->versetext;
    }
    
    /**
     * Sets the versetext.
     * 
     * @param string $value versetext
     */
    public function setVersetext( $value )
    {
        $this->versetext = $value;
    }

       
    /**
     * Constructs a new instance of Bible
     */
    public function __construct()
    {
        $this->sessionverses = new ArrayCollection();
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
