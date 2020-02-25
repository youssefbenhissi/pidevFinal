<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * parents
 *
 * @ORM\Table(name="parents")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\parentsRepository")
 */
class parents
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
     *@Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="5",
     *     max="30",
     *    minMessage="Il faut au min 5 carractères",
     *    maxMessage="Max 30 carractères"
     * )
     *
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\NotBlank(message="Prénom ne doit pas être vide")
     * @Assert\Length(
     *     min="5",
     *     max="20",
     *    minMessage="Il faut au min 5 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     *
     */
    private $prenom;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;
    /**
     * @var int
     *
     * @ORM\Column(name="numTelephone", type="integer")
     * @Assert\NotBlank(message="Numéro de téléphone ne doit pas être vide")
     * @Assert\Length(
     *     min="8",
     *    minMessage="Il faut 8 chiffres",
     * )
     *
     */
    private $numTelephone;

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
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $adressMail;


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
     * @return parents
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
     * @return parents
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
     * Set numTelephone
     *
     * @param integer $numTelephone
     *
     * @return parents
     */
    public function setNumTelephone($numTelephone)
    {
        $this->numTelephone = $numTelephone;

        return $this;
    }

    /**
     * Get numTelephone
     *
     * @return int
     */
    public function getNumTelephone()
    {
        return $this->numTelephone;
    }

    /**
     * Set adressMail
     *
     * @param string $adressMail
     *
     * @return parents
     */
    public function setAdressMail($adressMail)
    {
        $this->adressMail = $adressMail;

        return $this;
    }

    /**
     * Get adressMail
     *
     * @return string
     */
    public function getAdressMail()
    {
        return $this->adressMail;
    }

    public function __toString()
    {
        return $this->nom;
    }


}

