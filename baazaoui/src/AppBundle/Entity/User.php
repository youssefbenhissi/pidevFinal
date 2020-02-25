<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
      /**
       * @var string
       * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
       */
    private $facebookId;

    private $facebookAccessToken;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }/**
 * @return mixed
 */
public function getFacebookId()
{
    return $this->facebookId;
}/**
 * @param mixed $facebookId
 */
public function setFacebookId($facebookId)
{
    $this->facebookId = $facebookId;
}/**
 * @return mixed
 */
public function getFacebookAccessToken()
{
    return $this->facebookAccessToken;
}/**
 * @param mixed $facebookAccessToken
 */
public function setFacebookAccessToken($facebookAccessToken)
{
    $this->facebookAccessToken = $facebookAccessToken;
}

}
