<?php

namespace gererClubBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="gererClubBundle\Repository\ClubRepository")
 */
class Club
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
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    /**
     * @var int
     ** @Assert\GreaterThanOrEqual(
     *     value = "1",
     *     message = "Veuillez choisir un entier valide."
     * )
     * @ORM\Column(name="capacite", type="integer")
     */
    private $capacite;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="categorieClub", cascade={"remove"})
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\File(maxSize="1024k",mimeTypes={"image/jpeg","image/jpg"})
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrLike", type="integer")
     */
    private $nbrLike=0;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrFoisLike", type="integer")
     */
    private $nbrFoisLike=0;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenneLike", type="float")
     */
    private $moyenneLike=0;
    /**
     * @var string
     *
     * @ORM\Column(name="questionPr", type="string", length=255)
     */
    private $questionPr;
    /**
     * @var string
     *
     * @ORM\Column(name="questionDe", type="string", length=255)
     */
    private $questionDe;
    /**
     * @var string
     *
     * @ORM\Column(name="questionTr", type="string", length=255)
     */
    private $questionTr;

    /**
     * @return string
     */
    public function getQuestionPr()
    {
        return $this->questionPr;
    }

    /**
     * @param string $questionPr
     */
    public function setQuestionPr($questionPr)
    {
        $this->questionPr = $questionPr;
    }

    /**
     * @return string
     */
    public function getQuestionDe()
    {
        return $this->questionDe;
    }

    /**
     * @param string $questionDe
     */
    public function setQuestionDe($questionDe)
    {
        $this->questionDe = $questionDe;
    }

    /**
     * @return string
     */
    public function getQuestionTr()
    {
        return $this->questionTr;
    }

    /**
     * @param string $questionTr
     */
    public function setQuestionTr($questionTr)
    {
        $this->questionTr = $questionTr;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Club
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
     * Set description
     *
     * @param string $description
     *
     * @return Club
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
     * Set capacite
     *
     * @param integer $capacite
     *
     * @return Club
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * Get capacite
     *
     * @return int
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Club
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
     * Set nbrLike
     *
     * @param integer $nbrLike
     *
     * @return Club
     */
    public function setNbrLike($nbrLike)
    {
        $this->nbrLike = $nbrLike;

        return $this;
    }

    /**
     * Get nbrLike
     *
     * @return int
     */
    public function getNbrLike()
    {
        return $this->nbrLike;
    }

    /**
     * Set nbrFoisLike
     *
     * @param integer $nbrFoisLike
     *
     * @return Club
     */
    public function setNbrFoisLike($nbrFoisLike)
    {
        $this->nbrFoisLike = $nbrFoisLike;

        return $this;
    }

    /**
     * Get nbrFoisLike
     *
     * @return int
     */
    public function getNbrFoisLike()
    {
        return $this->nbrFoisLike;
    }

    /**
     * Set moyenneLike
     *
     * @param float $moyenneLike
     *
     * @return Club
     */
    public function setMoyenneLike($moyenneLike)
    {
        $this->moyenneLike = $moyenneLike;

        return $this;
    }

    /**
     * Get moyenneLike
     *
     * @return float
     */
    public function getMoyenneLike()
    {
        return $this->moyenneLike;
    }
}

