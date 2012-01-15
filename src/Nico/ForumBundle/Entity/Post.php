<?php

namespace Nico\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nico\ForumBundle\Entity\Post
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Post
{

    /**
     * @ORM\ManyToOne(targetEntity="Thread", inversedBy="posts")
     * @ORM\JoinColumn(name="thread_id", referencedColumnName="id")
     */
    protected $thread;

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
     * @var text $body
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var datetime $datecreated
     *
     * @ORM\Column(name="datecreated", type="datetime")
     */
    private $datecreated;

    /**
     * @var datetime $dateupdated
     *
     * @ORM\Column(name="dateupdated", type="datetime")
     */
    private $dateupdated;


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
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
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
     * Set dateupdated
     *
     * @param datetime $dateupdated
     */
    public function setDateupdated($dateupdated)
    {
        $this->dateupdated = $dateupdated;
    }

    /**
     * Get dateupdated
     *
     * @return datetime 
     */
    public function getDateupdated()
    {
        return $this->dateupdated;
    }

    /**
     * Set thread
     *
     * @param Nico\ForumBundle\Entity\Thread $thread
     */
    public function setThread(\Nico\ForumBundle\Entity\Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get thread
     *
     * @return Nico\ForumBundle\Entity\Thread 
     */
    public function getThread()
    {
        return $this->thread;
    }
}