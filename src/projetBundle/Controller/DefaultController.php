<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->isGranted("ROLE_ADMIN")){
            return $this->redirectToRoute('admin_homepage');
        }




        return $this->render('@projet/Default/index.html.twig');
    }
}
