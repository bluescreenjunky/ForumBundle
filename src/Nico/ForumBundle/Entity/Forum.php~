<?php

namespace Nico\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nico\ForumBundle\Entity\Forum
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Forum
{

    /**
     * @ORM\OneToMany(targetEntity="Thread", mappedBy="forum")
     */
    protected $threads;

    public function __construct()
    {
        $this->threads = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Forum", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity="Forum", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;


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
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add threads
     *
     * @param Nico\ForumBundle\Entity\Thread $threads
     */
    public function addThread(\Nico\ForumBundle\Entity\Thread $threads)
    {
        $this->threads[] = $threads;
    }

    /**
     * Get threads
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getThreads()
    {
        return $this->threads;
    }

    /**
     * Add children
     *
     * @param Nico\ForumBundle\Entity\Forum $children
     */
    public function addForum(\Nico\ForumBundle\Entity\Forum $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param Nico\ForumBundle\Entity\Forum $parent
     */
    public function setParent(\Nico\ForumBundle\Entity\Forum $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return Nico\ForumBundle\Entity\Forum 
     */
    public function getParent()
    {
        return $this->parent;
    }
}