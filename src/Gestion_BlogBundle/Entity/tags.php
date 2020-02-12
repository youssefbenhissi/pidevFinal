<?php

namespace Gestion_BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="Gestion_BlogBundle\Repository\tagsRepository")
 */
class tags
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;



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
     * Set nom
     *
     * @param string $nom
     *
     * @return tags
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }



    public function __toString()
    {
       return $this->nom;
    }


}

