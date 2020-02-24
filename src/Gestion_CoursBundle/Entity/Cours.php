<?php

namespace Gestion_CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="Gestion_CoursBundle\Repository\CoursRepository")
 */
class Cours
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
     *  @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="4",
     *     max="20",
     *    minMessage="Il faut au min 4 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="path_pdf", type="string", length=255)
     * @Assert\File(maxSize="5120k",mimeTypes={"application/pdf"})
     */
    private $pathPdf;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     *  @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="70",
     *     max="250",
     *    minMessage="Il faut au min 70 carractères",
     *    maxMessage="Max 250 carractères"
     * )
     */
    private $Description;

    /**
     * @var int
     *
     * @ORM\Column(name="vues", type="integer")
     */
    private $vues;

    /**
     * @var int
     *
     * @ORM\Column(name="telenbr", type="integer")
     */
    private $telenbr;


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
     * @return Cours
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
     * Set pathPdf
     *
     * @param string $pathPdf
     *
     * @return Cours
     */
    public function setPathPdf($pathPdf)
    {
        $this->pathPdf = $pathPdf;

        return $this;
    }

    /**
     * Get pathPdf
     *
     * @return string
     */
    public function getPathPdf()
    {
        return $this->pathPdf;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return int
     */
    public function getVues()
    {
        return $this->vues;
    }

    /**
     * @param int $vues
     */
    public function setVues($vues)
    {
        $this->vues = $vues;
    }

    /**
     * @return int
     */
    public function getTelenbr()
    {
        return $this->telenbr;
    }

    /**
     * @param int $telenbr
     */
    public function setTelenbr($telenbr)
    {
        $this->telenbr = $telenbr;
    }


}

