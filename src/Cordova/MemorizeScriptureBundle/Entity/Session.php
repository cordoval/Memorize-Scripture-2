<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\SessionRepository")
 * @orm:Table(name="session")
 * @orm:HasLifecycleCallbacks
 */
class Session
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
     * @var string $title
     */
    protected $title;

    /**
     * @orm:OneToMany(targetEntity="SessionVerse", mappedBy="session")
     * @orm:OrderBy({"createdAt" = "DESC"})
     * 
     * @var ArrayCollection $sessionverses
     */
    protected $sessionverses;
    
    /**
     * @orm:Column(type="datetime", name="created_at")
     * 
     * @var DateTime $createdAt
     */
    protected $createdAt;
    
    /**
     * @orm:Column(type="datetime", name="updated_at", nullable="true")
     * 
     * @var DateTime $updatedAt
     */
    protected $updatedAt;
    
    /**
     * @orm:ManyToOne(targetEntity="User", inversedBy="sessions")
     * @orm:JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * @var User $user
     */
    protected $user;
    
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
     * Gets the title of the session.
     * 
     * @return string The title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title of the session.
     * 
     * @param string $value The title
     */
    public function setTitle( $value )
    {
        $this->title = $value;
    }


    /**
     * Set the session's sessionverses
     *
     * @param SessionVerse $value The sessionverse.
     */
    public function addSessionVerse( $value )
    {
        $value->setSession($this);
        $this->sessionverses->add($value);
    }

    /**
     * Gets the sessionverses of the session.
     * 
     * @return ArrayCollection The session sessionverses
     */
    public function getSessionVerses()
    {
        return $this->sessionverses;
    }
      
    /**
     * Gets an object representing the date and time the session was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Gets an object representing the date and time the session was updated.
     * 
     * @return DateTime A DateTime object
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    /**
     * Gets the user who created the session.
     * 
     * @return User A User object
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Sets the user who created the session.
     * 
     * @param User $value The user
     */
    public function setUser( User $value )
    {
        $this->user = $value;
    }
       
    /**
     * Constructs a new instance of Session.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->sessionverses = new ArrayCollection();
    }
    
    /**
     * Invoked before the entity is updated.
     * 
     * @orm:PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
