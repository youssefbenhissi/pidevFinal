<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="nomCategorieEvenement", type="string", length=255)
     * @Assert\Regex(
     *     pattern     = "/^[a-zA-Z ]+$/",
     *     match=true,
     *     message="Veuillez un choisir un nom valide."
     * )
     */
    private $nomCategorieEvenement;

    /**
     *
     * @var string
     * @Assert\File(maxSize="1024k",mimeTypes={"image/jpeg","image/jpg"})
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
     * @return string
     */
    public function getNomCategorieEvenement()
    {
        return $this->nomCategorieEvenement;
    }

    /**
     * @param string $nomCategorieEvenement
     */
    public function setNomCategorieEvenement($nomCategorieEvenement)
    {
        $this->nomCategorieEvenement = $nomCategorieEvenement;
    }

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


}

