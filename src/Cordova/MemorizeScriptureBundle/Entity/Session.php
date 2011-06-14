<?php

namespace Cordova\MemorizeScriptureBundle\Entity;
//implements \Serializable
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\SessionRepository")
 * @ORM\Table(name="session")
 * @ORM\HasLifecycleCallbacks
 */
class Session
{

    public function serialize()
    {
      return serialize(
           array(
                $this->id,
                $this->title,
                $this->sessionverses,
                $this->createdAt,
                $this->updatedAt,
                $this->user
           )
      );
    }

    public function unserialize($serialized)
    {
      list(
          $this->id,
          $this->title,
          $this->sessionverses,
          $this->createdAt,
          $this->updatedAt
      ) = unserialize($serialized);
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    public $id;

    /**
     * @ORM\Column(type="string", length="255")
     *
     * @var string $title
     */
    public $title;

    /**
     * @ORM\OneToMany(targetEntity="SessionVerse", mappedBy="session")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $sessionverses
     */
    public $sessionverses;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    public $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable="true")
     *
     * @var DateTime $updatedAt
     */
    public $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sessions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     * @var User $user
     */
    public $user;

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
    public function addSessionverse( $value )
    {
        $value->setSession($this);
        $this->sessionverses->add($value);
    }

    /**
     * Gets the sessionverses of the session.
     *
     * @return ArrayCollection The session sessionverses
     */
    public function getSessionverses()
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
     * Set the session's sessionverses
     *
     * @param SessionVerse $value The sessionverse.
     */
    public function setActive()
    {
        $user = $this->getUser();
        $user->setActiveSession($this->id);
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
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
