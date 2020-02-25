<?php

namespace EtablissementBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="EtablissementBundle\Repository\EtablissementRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Etablissement
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
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\File(maxSize="500k", mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="numTel", type="bigint")
     * @Assert\GreaterThanOrEqual(
     *     value = "0",
     *     message = "Veuillez choisir une capacite valide "
     * )
     */
    private $numTel;

    /**
     * @ORM\OneToMany(targetEntity="EtablissementBundle\Entity\Etablissementcomment", mappedBy="etablissement",cascade={"remove"}, orphanRemoval=true)
     */
    private $comments;
    /**
     * @ORM\OneToMany(targetEntity="EtablissementBundle\Entity\Reclamation", mappedBy="etablissement",cascade={"remove"}, orphanRemoval=true)
     */
    private $reclamations;


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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etablissement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etablissement
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
     * Set image
     *
     * @param string $image
     *
     * @return Etablissement
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set numTel
     *
     * @param integer $numTel
     *
     * @return Etablissement
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return int
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */

    public function getReclamations()
    {
        return $this->reclamations;
    }

    /**
     * @param mixed $reclamations
     */
    public function setReclamations($reclamations)
    {
        $this->reclamations = $reclamations;
    }


}

