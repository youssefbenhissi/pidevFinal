<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="4",
     *     max="20",
     *    minMessage="Il faut au min 4 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     *
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank(message="Description ne doit pas être vide")
     * @Assert\Length(
     *     min="120",
     *     max="300",
     *    minMessage="Il faut au min 120 carractères",
     *    maxMessage="Max 300 carractères"
     * )
     *
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
     * @Assert\NotBlank(message="Type ne doit pas être vide")
     * @Assert\Length(
     *     min="5",
     *     max="20",
     *    minMessage="Il faut au min 5 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     *
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
     * @Assert\NotBlank(message="Prénom ne doit pas être vide")
     * @Assert\Length(
     *     min="12",
     *     max="20",
     *    minMessage="Il faut au min 12 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     *
     */
    private $prenom;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateDebTravail", type="date")
     * @Assert\NotBlank(message="Date de début ne doit pas être vide")
     */
    private $dateDebTravail;

    /**
     * @var int
     *
     * @ORM\Column(name="soldeConge", type="integer")
     * @Assert\NotBlank(message="Solde de congé ne doit pas être vide")
     *
     */
    private $soldeConge;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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

