<?php

namespace BibliothequebackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="BibliothequebackBundle\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    public function getWebPath()
    {
        return null === $this->nomImage ? null : $this->getUploadDir().'/'.$this->nomImage;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire dans lequel sauvegarder les photos de profil
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'images';
    }

    public function uploadProfilePicture()
    {
        // Nous utilisons le nom de fichier original, donc il est dans la pratique
        // nécessaire de le nettoyer pour éviter les problèmes de sécurité

        // move copie le fichier présent chez le client dans le répertoire indiqué.
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // On sauvegarde le nom de fichier
        $this->nomImage = $this->file->getClientOriginalName();

        // La propriété file ne servira plus
        $this->file = null;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * @param mixed $nomImage
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
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

    /**
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return int
     */
    public function getNombredepage()
    {
        return $this->nombredepage;
    }

    /**
     * @param int $nombredepage
     */
    public function setNombredepage($nombredepage)
    {
        $this->nombredepage = $nombredepage;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status="non reserve";

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \Date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @var \Date
     *
     * @ORM\Column(name="date")
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
    @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 15,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
    */
    private $nom;
    /**
     * @Assert\File(maxSize="500k")
     *  @Assert\NotBlank(message="file ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    public $file;



    public $nomImage;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     *  @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     *  @Assert\NotBlank(message="auteur ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $auteur;

    /**
     * @var int
     *
     * @ORM\Column(name="nombredepage", type="integer")
     *  @Assert\NotBlank(message="nombre de page ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nombredepage;


    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="id_category",referencedColumnName="id")
     */
    private $category;
}

