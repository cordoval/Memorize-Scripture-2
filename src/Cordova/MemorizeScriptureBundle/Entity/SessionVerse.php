<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\SessionVerseRepository")
 * @orm:Table(name="sessionverse")
 * @orm:HasLifecycleCallbacks
 */
class SessionVerse
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
     * @orm:ManyToOne(targetEntity="Session", inversedBy="sessionverses")
     * @orm:JoinColumn(name="session_id", referencedColumnName="id")
     * 
     * @var Session $session
     */
    protected $session;
    
    /**
     * @orm:ManyToOne(targetEntity="Verse", mappedBy="sessionverse")
     *
     * @var Verse $verse
     */
    private $verse;
    
    /**
     * @orm:Column(type="datetime", name="entry_date")
     * 
     * @var DateTime $entryDate
     */
    protected $entryDate;
    
    /**
     * @orm:Column(type="text")
     * 
     * @var string $recited_times
     */
    protected $recited_times;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $extended_recited_times
     */
    protected $extended_recited_times;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $active_day
     */
    protected $active_day;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $active_week
     */
    protected $active_week;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $active_month
     */
    protected $active_month;

    /**
     * @orm:Column(type="text")
     * 
     * @var string $recitedyesno
     */
    protected $recitedyesno;
    
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
     * Gets the id.
     * 
     * @return integer The id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the session who created the sessionverse.
     *
     * @return Session A Session object
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Sets the session who created the sessionverse.
     *
     * @param Session $value The session
     */
    public function setSession( Session $value )
    {
        $this->session = $value;
    }

    /**
     * Gets the verse of the sessionverse.
     * 
     * @return Verse sessionverse verse
     */
    public function getVerse()
    {
        return $this->verse;
    }
    
    /**
     * Sets the verse for the sessionverse.
     * 
     * @param Verse $value The verse
     */
    public function setVerse( $value )
    {
        $value->setSessionVerse($this);
        $this->verse = $value;
    }
    
    /**
     * Gets the entryDate
     * 
     * @return DateTime sessionverse entryDate
     */
    public function getEntryDate()
    {
	return $this->entryDate;
    }

    /**
     * Sets the entryDate
     * 
     * @param DateTime sessionverse entryDate
     */
    public function setEntryDate( $value )
    {
	$this->entryDate = $value;
    }

    /**
     * Gets the recited_times.
     * 
     * @return string sessionverse recited_times
     */
    public function getRecitedTimes()
    {
        return $this->recited_times;
    }
    
    /**
     * Sets the recited_times.
     * 
     * @param string $value sessionverse recited_times
     */
    public function setRecitedTimes( $value )
    {
        $this->recited_times = $value;
    }

    /**
     * Gets the extended_recited_times.
     * 
     * @return string sessionverse extended_recited_times
     */
    public function getExtendedRecitedTimes()
    {
        return $this->extended_recited_times;
    }
    
    /**
     * Sets the extended_recited_times.
     * 
     * @param string $value sessionverse extended_recited_times
     */
    public function setExtendedRecitedTimes( $value )
    {
        $this->extended_recited_times = $value;
    }

    /**
     * Gets the active_day.
     * 
     * @return string sessionverse active_day
     */
    public function getActiveDay()
    {
        return $this->active_day;
    }
    
    /**
     * Sets the active_day.
     * 
     * @param string $value sessionverse active_day
     */
    public function setActiveDay( $value )
    {
        $this->active_day = $value;
    }
    
    /**
     * Gets the active_week.
     * 
     * @return string sessionverse active_week
     */
    public function getActiveWeek()
    {
        return $this->active_week;
    }
    
    /**
     * Sets the active_week.
     * 
     * @param string $value sessionverse active_week
     */
    public function setActiveWeek( $value )
    {
        $this->active_week = $value;
    }

    /**
     * Gets the active_month
     * 
     * @return string sessionverse active_month
     */
    public function getActiveMonth()
    {
        return $this->active_month;
    }
    
    /**
     * Sets the active_month.
     * 
     * @param string $value sessionverse active_month
     */
    public function setActiveMonth( $value )
    {
        $this->active_month = $value;
    }
    
    /**
     * Gets the recitedyesno
     * 
     * @return string sessionverse recitedyesno
     */
    public function getRecitedyesno()
    {
        return $this->recitedyesno;
    }
    
    /**
     * Sets the recitedyesno.
     * 
     * @param string $value sessionverse recitedyesno
     */
    public function setRecitedyesno( $value )
    {
        $this->recitedyesno = $value;
    }

    /**
     * Gets an object representing the date and time the post was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Gets an object representing the date and time the post was updated.
     * 
     * @return DateTime A DateTime object
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
      
    /**
     * Constructs a new instance of Post.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
