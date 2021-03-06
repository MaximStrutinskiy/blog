<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Category
 * @package BlogBundle\Entity
 * @ORM\Table(name="category")
 * @ORM\Entity()
 **/
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=75, nullable=false)
     *
     * @Assert\Length(
     *     min=3,
     *     max=75,
     *     minMessage="min length > 3.",
     *     maxMessage="max length < 75.",
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=1000, nullable=false)
     *
     * @Assert\Length(
     *     min=3,
     *     max=1000,
     *     minMessage="min length > 3.",
     *     maxMessage="max length < 75.",
     * )
     */
    protected $description;

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
     * @return Category
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
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
}
