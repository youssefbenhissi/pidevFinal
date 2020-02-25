<?php
// src/AppBundle/Entity/User.php

namespace EtablissementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="EtablissementBundle\Repository\EtablissementRepository")
 * @ORM\Table(name="Etablissementcomment")
 * @ORM\HasLifecycleCallbacks()
 */

class Etablissementcomment
{

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", unique=false)
     */
    private $content;




    /**
     * @ORM\ManyToOne(targetEntity="EtablissementBundle\Entity\Etablissement", inversedBy="comments")
     * @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id")
     */
    private $etablissement;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var date
     * @Assert\DateTime
     * @ORM\Column(name="posted_at", type="date")
     */
    private $posted_at;


    /**
     * @param \DateTime $posted_at
     */

    public function setPostedAt()
    {
        $this->posted_at = new \DateTime('now');
    }
    /**
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->posted_at;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * @return mixed
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * @param mixed $etablissement
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;
    }


}



