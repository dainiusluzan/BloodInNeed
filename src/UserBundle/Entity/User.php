<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
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
     * @ORM\Column(type="string", length=255)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=12)
     */
    protected $phone;

    /**
     * @ORM\Column(type="integer")
     */
    protected $age;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $bloodType;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $rhFactor;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * @param mixed $bloodType
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;
    }

    /**
     * @return mixed
     */
    public function getRhFactor()
    {
        return $this->rhFactor;
    }

    /**
     * @param mixed $rhFactor
     */
    public function setRhFactor($rhFactor)
    {
        $this->rhFactor = $rhFactor;
    }
}