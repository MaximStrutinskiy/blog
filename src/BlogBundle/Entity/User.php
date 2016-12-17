<?php

namespace BlogBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The soname is too short.",
     *     maxMessage="The soname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $soname;

    /**
     * @ORM\Column(type="integer", nullable=true)

     *
     * )
     */
    protected $age;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=25,
     *     minMessage="So short City name.",
     *     maxMessage="So long City name.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the image.")
     *     maxSize = "2M",
     *     mimeTypes = {"application/png", "application/jpeg"},
     *     mimeTypesMessage = "Please upload a valid PDF or JPEG"
     */
    protected $img;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set soname
     *
     * @param string $soname
     *
     * @return User
     */
    public function setSoname($soname)
    {
        $this->soname = $soname;

        return $this;
    }

    /**
     * Get soname
     *
     * @return string
     */
    public function getSoname()
    {
        return $this->soname;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return User
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }
}
