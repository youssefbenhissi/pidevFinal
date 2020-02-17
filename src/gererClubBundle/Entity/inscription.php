<?php

namespace gererClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;
/**
 * inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="gererClubBundle\Repository\inscriptionRepository")
 * @Notifiable(name="inscription")
 */
class inscription
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
     * @ORM\Column(name="questionPr", type="string", length=255)
     */
    private $questionPr;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id")
     */
    private $club;

    /**
     * @return mixed
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * @param mixed $eleve
     */
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;
    }

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="eleve", cascade={"remove"})
     * @ORM\JoinColumn(name="eleve_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $eleve;
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
     * @var string
     *
     * @ORM\Column(name="reponsePr", type="string", length=255)
     */
    private $reponsePr;

    /**
     * @var string
     *
     * @ORM\Column(name="questionDe", type="string", length=255)
     */
    private $questionDe;

    /**
     * @var string
     *
     * @ORM\Column(name="reponseDe", type="string", length=255)
     */
    private $reponseDe;

    /**
     * @var string
     *
     * @ORM\Column(name="questionTr", type="string", length=255)
     */
    private $questionTr;
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status="non traitée";

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
     * @var string
     *
     * @ORM\Column(name="reponseTr", type="string", length=255)
     */
    private $reponseTr;


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
     * Set questionPr
     *
     * @param string $questionPr
     *
     * @return inscription
     */
    public function setQuestionPr($questionPr)
    {
        $this->questionPr = $questionPr;

        return $this;
    }

    /**
     * Get questionPr
     *
     * @return string
     */
    public function getQuestionPr()
    {
        return $this->questionPr;
    }

    /**
     * Set reponsePr
     *
     * @param string $reponsePr
     *
     * @return inscription
     */
    public function setReponsePr($reponsePr)
    {
        $this->reponsePr = $reponsePr;

        return $this;
    }

    /**
     * Get reponsePr
     *
     * @return string
     */
    public function getReponsePr()
    {
        return $this->reponsePr;
    }

    /**
     * Set questionDe
     *
     * @param string $questionDe
     *
     * @return inscription
     */
    public function setQuestionDe($questionDe)
    {
        $this->questionDe = $questionDe;

        return $this;
    }

    /**
     * Get questionDe
     *
     * @return string
     */
    public function getQuestionDe()
    {
        return $this->questionDe;
    }

    /**
     * Set reponseDe
     *
     * @param string $reponseDe
     *
     * @return inscription
     */
    public function setReponseDe($reponseDe)
    {
        $this->reponseDe = $reponseDe;

        return $this;
    }

    /**
     * Get reponseDe
     *
     * @return string
     */
    public function getReponseDe()
    {
        return $this->reponseDe;
    }

    /**
     * Set questionTr
     *
     * @param string $questionTr
     *
     * @return inscription
     */
    public function setQuestionTr($questionTr)
    {
        $this->questionTr = $questionTr;

        return $this;
    }

    /**
     * Get questionTr
     *
     * @return string
     */
    public function getQuestionTr()
    {
        return $this->questionTr;
    }

    /**
     * Set reponseTr
     *
     * @param string $reponseTr
     *
     * @return inscription
     */
    public function setReponseTr($reponseTr)
    {
        $this->reponseTr = $reponseTr;

        return $this;
    }

    /**
     * Get reponseTr
     *
     * @return string
     */
    public function getReponseTr()
    {
        return $this->reponseTr;
    }
}

