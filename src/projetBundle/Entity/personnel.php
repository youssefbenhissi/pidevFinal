<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * personnel
 *
 * @ORM\Table(name="personnel")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\personnelRepository")
 */
class personnel
{
    /**
     * @var int
     *
     * @ORM\Column(name="matricule", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $matricule;



    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateDebTravail", type="date")
     */
    private $dateDebTravail;

    /**
     * @var int
     *
     * @ORM\Column(name="soldeConge", type="integer")
     */
    private $soldeConge;


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
     * Set matricule
     *
     * @param integer $matricule
     *
     * @return personnel
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return int
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return personnel
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

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return personnel
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateDebTravail
     *
     * @param \DateTime $dateDebTravail
     *
     * @return personnel
     */
    public function setDateDebTravail($dateDebTravail)
    {
        $this->dateDebTravail = $dateDebTravail;

        return $this;
    }

    /**
     * Get dateDebTravail
     *
     * @return \DateTime
     */
    public function getDateDebTravail()
    {
        return $this->dateDebTravail;
    }

    /**
     * Set soldeConge
     *
     * @param integer $soldeConge
     *
     * @return personnel
     */
    public function setSoldeConge($soldeConge)
    {
        $this->soldeConge = $soldeConge;

        return $this;
    }

    /**
     * Get soldeConge
     *
     * @return int
     */
    public function getSoldeConge()
    {
        return $this->soldeConge;
    }
}

