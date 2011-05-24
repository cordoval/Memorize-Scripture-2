<?php

namespace Cordova\MemorizeScriptureBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Cordova\MemorizeScriptureBundle\Entity\PostRepository")
 * @ORM\Table(name="post")
 * @ORM\HasLifecycleCallbacks
 */
class Post
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
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $title
     */
    protected $title;
    
    /**
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $slug
     */
    protected $slug;
    
    /**
     * @ORM\Column(type="text")
     * 
     * @var string $content
     */
    protected $content;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     * 
     * @var DateTime $createdAt
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable="true")
     * 
     * @var DateTime $updatedAt
     */
    protected $updatedAt;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * 
     * @var Category $category
     */
    protected $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * @var User $user
     */
    protected $user;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="post_tag",
     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     * 
     * @var ArrayCollection $tags
     */
    protected $tags;
    
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
     * Gets the title of the post.
     * 
     * @return string The title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title of the post.
     * 
     * @param string $value The title
     */
    public function setTitle( $value )
    {
        $this->title = $value;
    }
    
    /**
     * Gets the slut for the post.
     * 
     * @return string The slug
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Sets the slug for the post.
     * 
     * @param string $value The slug
     */
    public function setSlug( $value )
    {
        $this->slug = $value;
    }
    
    /**
     * Gets the content of the post.
     * 
     * @return string The post content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the post content.
     * 
     * @param string $value The post content
     */
    public function setContent( $value )
    {
        $this->content = $value;
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
     * Gets the category the post is in.
     * 
     * @return Category A Category object
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Sets the category of the post.
     * 
     * @param Category $value The category
     */
    public function setCategory( Category $value )
    {
        $this->category = $value;
    }
    
    /**
     * Gets the user who created the post.
     * 
     * @return User A User object
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Sets the user who created the post.
     * 
     * @param User $value The user
     */
    public function setUser( User $value )
    {
        $this->user = $value;
    }
    
    /**
     * Gets the post tags.
     * 
     * @return ArrayCollection The tags
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Constructs a new instance of Post.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->tags = new ArrayCollection();
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
