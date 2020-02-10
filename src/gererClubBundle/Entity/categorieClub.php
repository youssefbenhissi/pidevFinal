<?php

namespace gererClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorieClub
 *
 * @ORM\Table(name="categorie_club")
 * @ORM\Entity(repositoryClass="gererClubBundle\Repository\categorieClubRepository")
 */
class categorieClub
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
     * @ORM\Column(name="nomCategorie", type="string", length=255)
     */
    private $nomCategorie;


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
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return categorieClub
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }
}

