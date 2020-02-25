<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\demandeRepository")
 */
class demande
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
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank(message="Description ne doit pas être vide")
     * @Assert\Length(
     *     min="60",
     *     max="300",
     *    minMessage="Il faut au min 60 carractères",
     *    maxMessage="Max 300 carractères"
     * )
     *
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     *
     */
    private $etat;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\GreaterThan("today")
     */
    private $date_de_sortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_retour", type="date")
     * @Assert\DateTime()
     * @Assert\Expression("value > this.getDateDeSortie()")
     */
    private $dateDeRetour;

    /**
     * @var \UserBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="parent",referencedColumnName="id")
     */
    private $parents;

    /**
     * @return \UserBundle\Entity\User
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param \UserBundle\Entity\User $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
    }





    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
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
     * Set description
     *
     * @param string $description
     *
     * @return demande
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



    /**
     * Set dateDeRetour
     *
     * @param \DateTime $dateDeRetour
     *
     * @return demande
     */
    public function setDateDeRetour($dateDeRetour)
    {
        $this->dateDeRetour = $dateDeRetour;

        return $this;
    }

    /**
     * Get dateDeRetour
     *
     * @return \DateTime $dateDeRetour
     */
    public function getDateDeRetour()
    {
        return $this->dateDeRetour;
    }

    /**
     * @return \DateTime $date_de_sortie
     */
    public function getDateDeSortie()
    {
        return $this->date_de_sortie;
    }

    /**
     * @param \DateTime $date_de_sortie
     */
    public function setDateDeSortie($date_de_sortie)
    {
        $this->date_de_sortie = $date_de_sortie;
    }


}

