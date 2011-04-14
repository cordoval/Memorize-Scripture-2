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
     * @orm:OneToMany(targetEntity="Verse", mappedBy="chapter")
     * @orm:OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $verses
     */
    protected $verses;

    /**
     * @orm:ManyToOne(targetEntity="Book", inversedBy="chapters")
     * @orm:JoinColumn(name="book_id", referencedColumnName="id")
     *
     * @var Book $book
     */
    private $book;

    /**
     * Gets the verses of the chapter.
     *
     * @return ArrayCollection $verses
     */
    public function getVerses()
    {
        return $this->verses;
    }

    /**
     * Sets the chapter verses.
     *
     * @param Verse $value verse
     */
    public function addVerse( $value )
    {
        $value->setChapter($this);
        $this->verses->add($value);
    }

    /**
     * Gets the book.
     *
     * @return Book book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Sets the book.
     *
     * @param Book $value book
     */
    public function setBook( $value )
    {
        $this->book = $value;
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
        $this->verses = new ArrayCollection();
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
