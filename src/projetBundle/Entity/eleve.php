<?php

namespace projetBundle\Entity;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *@ORM\Entity(repositoryClass="projetBundle\Repository\eleveRepository")
 * @ORM\Table(name="eleve")
 * @Notifiable(name="eleve")
 *
 */
class eleve implements NotifiableInterface
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
     * @Assert\NotBlank(message="Choisir un parent !")
     */
    private $parents;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank(message="Nom ne doit pas être vide")
     * @Assert\Length(
     *     min="4",
     *     max="30",
     *    minMessage="Il faut au min 4 carractères",
     *    maxMessage="Max 30 carractères"
     * )
     *
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\NotBlank(message="Prénom ne doit pas être vide")
     * @Assert\Length(
     *     min="4",
     *     max="20",
     *    minMessage="Il faut au min 4 carractères",
     *    maxMessage="Max 20 carractères"
     * )
     *
     */
    private $prenom;

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
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     * @Assert\NotBlank(message="Vous devez choisir votre sexe !")
     */
    private $sexe;
    /**
     * @var int
     *
     * @ORM\Column(name="Age", type="integer")
     * @Assert\Range(
     *      min = 6,
     *      max = 16,
     *      minMessage = "Il faut au min 6 {{ limit }}",
     *      maxMessage = "max {{ limit }}"
     * )
     */
    private $Age;


    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    /**
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
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
     * @return int
     */
    public function getAge()
    {
        return $this->Age;
    }

    /**
     * @param int $Age
     */
    public function setAge($Age)
    {
        $this->Age = $Age;
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
    public function getWebPath(){
        return null===$this->image ? null: $this->getUploaDir.'/'.$this->image;
    }
    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web'.$this->getUploadRootDir();

}
protected function getUploadDir(){
        return'images';
}
protected function UploadProfilePicture(){
        $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalname());
        $this->image=$this->file->getClientOriginalname();
        $this->file=null;
}
}

