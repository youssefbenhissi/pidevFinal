<?php

namespace gererClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@gererClub/Default/index.html.twig');
    }
}
