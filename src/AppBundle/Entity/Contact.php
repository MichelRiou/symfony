<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * Contact
 *
 * @ORM\Table(name="contact",
 *     indexes={
 *     @Index(name="idx_name",columns={"name"})
 *      }
 *     )
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=30, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfbirth", type="date", nullable=true)
     */
    private $dateOfbirth;
    /**
     * @var bool
     * @ORM\Column(name="active",type="boolean")
     */
    private $active=true;

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Contact
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Contact
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
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateOfbirth
     *
     * @param \DateTime $dateOfbirth
     *
     * @return Contact
     */
    public function setDateOfbirth($dateOfbirth)
    {
        $this->dateOfbirth = $dateOfbirth;

        return $this;
    }

    /**
     * Get dateOfbirth
     *
     * @return \DateTime
     */
    public function getDateOfbirth()
    {
        return $this->dateOfbirth;
    }
}

