<?php

namespace Dev\BlogTaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogTask
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class BlogTask
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255)
     */
    private $task;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="annotation", type="string", length=255)
     */
    private $annotation;

    /**
     * @var string
     *
     * @ORM\Column(name="textbody", type="text")
     */
    private $textbody;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * Set task
     *
     * @param string $task
     * @return BlogTask
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return BlogTask
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Set annotation
     *
     * @param string $annotation
     * @return BlogTask
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;

        return $this;
    }

    /**
     * Get annotation
     *
     * @return string 
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * Set textbody
     *
     * @param string $textbody
     * @return BlogTask
     */
    public function setTextbody($textbody)
    {
        $this->textbody = $textbody;

        return $this;
    }

    /**
     * Get textbody
     *
     * @return string 
     */
    public function getTextbody()
    {
        return $this->textbody;
    }

    /**
     * Set created
     *
     * @ORM\PrePersist()
     * @param \DateTime $created
     * @return BlogTask
     */
    public function setCreated()
    {
        if( !isset($this->created) )
        {
            $this->created = new \DateTime();
        }

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
