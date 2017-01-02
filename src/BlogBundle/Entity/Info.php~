<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Info
 * @package BlogBundle\Entity
 * @ORM\Table(name="info")
 * @ORM\Entity()
 **/
class Info
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $phone;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $message;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->created = new \DateTime();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Info
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Info
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Info
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Info
     */
    public function setCreated($created)
    {
        $this->created = $created;

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
