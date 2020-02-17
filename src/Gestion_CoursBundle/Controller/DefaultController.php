<?php

namespace Gestion_CoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Gestion_Cours/Default/index.html.twig');
    }
}
