<?php

namespace BibliothequebackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Bibliothequeback/Default/index.html.twig');
    }
}
