<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
//use Symfony\Component\Security\Core\User\UserInterface; 
//(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\UserRepository")
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @orm:Entity
 * @orm:Table(name="user")
 */
class User extends BaseUser implements \Serializable
{

    protected $bar;

    public function serialize()
    {
      return serialize(
           array(
                $this->id
           )
      );
    }

    public function unserialize($serialized)
    {
      list(
          $this->id
      ) = unserialize($serialized);
    }

    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     * 
     * @var integer $id
     */
    protected $id;
    
    /**
     * @orm:Column(type="string", length="255", name="first_name", nullable=true)
     * @var string $firstName
     */
    protected $firstName;
    
    /**
     * @orm:Column(type="string", length="255", name="last_name",nullable=true)
     * @var string $lastName
     */
    protected $lastName;
    
    /**
     * @orm:OneToMany(targetEntity="Post", mappedBy="user")
     * @orm:OrderBy({"createdAt" = "DESC"})
     * 
     * @var ArrayCollection $posts
     */
    protected $posts;

    /**
     * @orm:OneToMany(targetEntity="Session", mappedBy="user")
     * @orm:OrderBy({"createdAt" = "DESC"})
     * 
     * @var ArrayCollection $sessions
     */
    protected $sessions;

    /**
     * @orm:Column(type="string", length="255", name="activesessionid", nullable=true)
     * @var string $activesessionid
     */
    protected $activesessionid;
    
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
     * Gets the user's first name.
     * 
     * @return string The first name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the user's first name.
     * 
     * @param string $value The first name
     */
    public function setFirstName( $value )
    {
        $this->firstName = $value;
    }
    
    /**
     * Gets the user's last name.
     * 
     * @return string The last name
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the user's last name.
     * 
     * @param string $value The last name
     */
    public function setLastName( $value )
    {
        $this->lastName = $value;
    }

    /**
     * Set the user's session
     *
     * @param Session $value The session.
     */
    public function addSession( $value )
    {
        $value->setUser($this);
        $this->sessions->add($value);
    }
    
    /**
     * Gets all of the user's sessions
     * 
     * @return ArrayCollection The user's sessions
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Constructs a new instance of User
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        //$this->createdAt = new \DateTime();
        parent::__construct();
    }

    function setActiveSession($id) {
        $this->activesessionid = $id;
    }
    
    /**
     * Gets the full name of the user.
     * 
     * @return string The full name
     */
    public function getFullName()
    {
        return sprintf( '%s %s', $this->firstName, $this->lastName );
    }

	
}
