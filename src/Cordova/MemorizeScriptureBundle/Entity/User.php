<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
//use Symfony\Component\Security\Core\User\UserInterface;
//(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\UserRepository")
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser implements \Serializable
{

    public function serialize()
    {
      return serialize(
           array(
                $this->getUsername()
           )
      );
    }

    public function unserialize($serialized)
    {

      $arr = unserialize($serialized);
      $this->setUsername($arr[0]);
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="255", name="first_name", nullable=true)
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length="255", name="last_name",nullable=true)
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $posts
     */
    protected $posts;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="user")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $sessions
     */
    protected $sessions;

    /**
     * @ORM\Column(type="string", length="255", name="activesessionid", nullable=true)
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

    /**
     * Gets activesessionid
     *
     * @return string activesessionid
     */
    function getActivesessionid() {
        return $this->activesessionid;
    }

    /**
     * Sets activesessionid
     *
     * @param string $activesessionid the activesessionid
     */
    function setActivesessionid($id) {
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
