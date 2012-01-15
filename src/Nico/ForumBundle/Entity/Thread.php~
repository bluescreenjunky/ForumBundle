<?php

namespace Nico\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nico\ForumBundle\Entity\Thread
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Thread
{
    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="thread")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }


    /**
     * @ORM\ManyToOne(targetEntity="Forum", inversedBy="threads")
     * @ORM\JoinColumn(name="forum_id", referencedColumnName="id")
     */
    protected $forum;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var datetime $datecreated
     *
     * @ORM\Column(name="datecreated", type="datetime")
     */
    private $datecreated;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set datecreated
     *
     * @param datetime $datecreated
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;
    }

    /**
     * Get datecreated
     *
     * @return datetime 
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Add posts
     *
     * @param Nico\ForumBundle\Entity\Post $posts
     */
    public function addPost(\Nico\ForumBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Set forum
     *
     * @param Nico\ForumBundle\Entity\Forum $forum
     */
    public function setForum(\Nico\ForumBundle\Entity\Forum $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Get forum
     *
     * @return Nico\ForumBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }
}