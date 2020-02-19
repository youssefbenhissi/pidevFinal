<?php

namespace Gestion_BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     *  @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="3",
     *     max="10",
     *    minMessage="Il faut au min 3 carractères",
     *    maxMessage="Max 10 carractères"
     * )
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     */

    private $articles;


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

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
    }




}

