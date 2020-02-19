<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
   /* public function indexAction()
    {
        return $this->render('@Admin/Default/index.html.twig');
    }*/
    public function indexAction()
    {
        if ($this->isGranted("ROLE_ADMIN")){
            return $this->redirectToRoute('afficherCat');
        }

        if ($this->isGranted("ROLE_USER")){
            return $this->redirectToRoute('affichercategorie');
        }

        return $this->redirectToRoute('fos_user_security_login');
    }

}
