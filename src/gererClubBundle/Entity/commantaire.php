<?php

namespace gererClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commantaire
 *
 * @ORM\Table(name="commantaire")
 * @ORM\Entity(repositoryClass="gererClubBundle\Repository\commantaireRepository")
 */
class commantaire
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
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Club", cascade={"remove"})
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $club;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"remove"})
     * @ORM\JoinColumn(name="user",referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * Set message
     *
     * @param string $message
     *
     * @return commantaire
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
}

