<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @Assert\Regex(
     *     pattern="/\W/",
     *     message="Your name cannot contain a number"
     * )
     * @var string
     *
     * @ORM\Column(name="nomE", type="string", length=255)
     */
    private $nomE;

    /**
     * @var int
     * @ORM\Column(name="capaciteE", type="integer")
     */
    private $capaciteE;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imgE", type="string", length=255)
     */
    private $imgE;

    /**
     * @var int
     * @ORM\Column(name="prixE", type="integer")
     */
    private $prixE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateD", type="date")
     */
    private $dateD;

    /**
     * Evenement constructor.
     */
    public function __construct()
    {
        $this->dateD = new \DateTime('now');
    }


    /**
     * @Assert\Date
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomE
     *
     * @param string $nomE
     *
     * @return Evenement
     */
    public function setNomE($nomE)
    {
        $this->nomE = $nomE;

        return $this;
    }

    /**
     * Get nomE
     *
     * @return string
     */
    public function getNomE()
    {
        return $this->nomE;
    }

    /**
     * Set capaciteE
     *
     * @param integer $capaciteE
     *
     * @return Evenement
     */
    public function setCapaciteE($capaciteE)
    {
        $this->capaciteE = $capaciteE;

        return $this;
    }

    /**
     * Get capaciteE
     *
     * @return int
     */
    public function getCapaciteE()
    {
        return $this->capaciteE;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
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
     * Set imgE
     *
     * @param string $imgE
     *
     * @return Evenement
     */
    public function setImgE($imgE)
    {
        $this->imgE = $imgE;

        return $this;
    }

    /**
     * Get imgE
     *
     * @return string
     */
    public function getImgE()
    {
        return $this->imgE;
    }

    /**
     * Set prixE
     *
     * @param integer $prixE
     *
     * @return Evenement
     */
    public function setPrixE($prixE)
    {
        $this->prixE = $prixE;

        return $this;
    }

    /**
     * Get prixE
     *
     * @return int
     */
    public function getPrixE()
    {
        return $this->prixE;
    }

    /**
     * Set dateD
     *
     * @param \DateTime $dateD
     *
     * @return Evenement
     */
    public function setDateD($dateD)
    {
        $this->dateD = $dateD;

        return $this;
    }

    /**
     * Get dateD
     *
     * @return \DateTime
     */
    public function getDateD()
    {
        return $this->dateD;
    }


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="categorieEvenement")
     * @ORM\JoinColumn(name="categorieEvenement_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $categorieEvenement;

    /**
     * @return mixed
     */
    public function getCategorieEvenement()
    {
        return $this->categorieEvenement;
    }

    /**
     * @param mixed $categorieEvenement
     */
    public function setCategorieEvenement($categorieEvenement)
    {
        $this->categorieEvenement = $categorieEvenement;
    }



}

