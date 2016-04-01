<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Town
 *
 * @ORM\Table(name="towns")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\TownRepository")
 */
class Town
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
     * @ORM\Column(name="town", type="string", length=255)
     */
    private $town;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="town")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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
     * Set town
     *
     * @param string $town
     *
     * @return Town
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    public function __toString()
    {
        return $this->id.'';
    }
}
