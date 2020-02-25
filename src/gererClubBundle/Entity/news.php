<?php

namespace gererClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * news
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="gererClubBundle\Repository\newsRepository")
 */
class news
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
     * @ORM\Column(name="newsContenu", type="string", length=255)
     */
    private $newsContenu;


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
     * Set newsContenu
     *
     * @param string $newsContenu
     *
     * @return news
     */
    public function setNewsContenu($newsContenu)
    {
        $this->newsContenu = $newsContenu;

        return $this;
    }

    /**
     * Get newsContenu
     *
     * @return string
     */
    public function getNewsContenu()
    {
        return $this->newsContenu;
    }
}

