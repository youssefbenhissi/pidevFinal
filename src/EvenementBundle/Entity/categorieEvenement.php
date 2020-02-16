<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorieEvenement
 *
 * @ORM\Table(name="categorie_evenement")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\categorieEvenementRepository")
 */
class categorieEvenement
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
     * @ORM\Column(name="nomCategorieEvenement", type="string", length=255)
     */
    private $nomCategorieEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set nomCategorieEvenement
     *
     * @param string $nomCategorieEvenement
     *
     * @return categorieEvenement
     */
    public function setNomCategorieEvenement($nomCategorieEvenement)
    {
        $this->nomCategorieEvenement = $nomCategorieEvenement;

        return $this;
    }

    /**
     * Get nomCategorieEvenement
     *
     * @return string
     */
    public function getNomCategorieEvenement()
    {
        return $this->nomCategorieEvenement;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return categorieEvenement
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
     * Set description
     *
     * @param string $description
     *
     * @return categorieEvenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }




}

