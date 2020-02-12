<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\eleveRepository")
 */
class eleve
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
     * @return mixed
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param mixed $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
    }
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="parents")
     * @ORM\JoinColumn(name="parents_id",referencedColumnName="id")
     */
    private $parents;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adressMail", type="string", length=255)
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
     * Set numInscription
     *
     * @param string $numInscription
     *
     * @return eleve
     */
    public function setNumInscription($numInscription)
    {
        $this->numInscription = $numInscription;

        return $this;
    }

    /**
     * Get numInscription
     *
     * @return string
     */
    public function getNumInscription()
    {
        return $this->numInscription;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return eleve
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
     * @return eleve
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
     * Set adressMail
     *
     * @param string $adressMail
     *
     * @return eleve
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
}

