<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
//use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * galerie
 *
 * @ORM\Table(name="galerie")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\galerieRepository")
 * @Vich\Uploadable()
 */
class galerie
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="event_affiche", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="gererClubBundle\Entity\Club", cascade={"remove"})
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $club;

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }
    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;
    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /*
     * galerie constructor.
     * @param \DateTimeInterface|null $updatedAt
     */
    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /*
     * @param File|null $imageFile
     */
    public function setImageFile($image=null)
    {
        $this->imageFile = $image;
        if(null != $image)
        {
            $this->updatedAt=new \DateTimeImmutable();
        }
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string|null $imageName
     */
    public function setImageName($imageName)
    {

        $this->imageName = $imageName;

    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}
