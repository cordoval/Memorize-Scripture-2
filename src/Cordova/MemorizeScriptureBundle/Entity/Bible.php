<?php

//namespace Vendor\FirstBundle\Entity;
namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\BibleRepository")
 * @ORM\Table(name="bible")
 */
class Bible
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @var integer $id
     */
    protected $id;
       
    /**
     * @ORM\Column(type="text")
     * 
     * @var string $version
     */
    protected $version;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="bible")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $books
     */
    protected $books;

    /**
     * Gets the books of the bible.
     *
     * @return ArrayCollection $books
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Sets the bible books.
     *
     * @param Book $value book
     */
    public function addBook( $value )
    {
        $value->setBible($this);
        $this->books->add($value);
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
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
    }
}
