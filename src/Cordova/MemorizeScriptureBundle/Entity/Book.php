<?php

//namespace Vendor\FirstBundle\Entity;
namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
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
     * @var string $title
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="Chapter", mappedBy="book")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $chapters
     */
    protected $chapters;

    /**
     * @ORM\ManyToOne(targetEntity="Bible", inversedBy="books")
     * @ORM\JoinColumn(name="bible_id", referencedColumnName="id")
     *
     * @var Bible $bible
     */
    private $bible;

    /**
     * Gets the chapters of the book.
     *
     * @return ArrayCollection $chapters
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * Sets the book chapters.
     *
     * @param Chapter $value chapter
     */
    public function addChapter( $value )
    {
        $value->setBook($this);
        $this->chapters->add($value);
    }

    /**
     * Gets the bible.
     *
     * @return Bible $bible
     */
    public function getBible()
    {
        return $this->bible;
    }
    
    /**
     * Sets the bible.
     *
     * @param Bible $value bible
     */
    public function setBible( $value )
    {
        $this->bible = $value;
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
     * Gets the title.
     * 
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title.
     * 
     * @param string $value title
     */
    public function setTitle( $value )
    {
        $this->title = $value;
    }
       
    /**
     * Constructs a new instance of Bible
     */
    public function __construct()
    {
        $this->chapters = new ArrayCollection();
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
