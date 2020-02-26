<?php

namespace adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
   /* public function indexAction()
    {
        return $this->render('@admin/Default/index.html.twig');
    }*/
    public function indexAction()
    {
        if ($this->isGranted("ROLE_ADMIN")){
            return $this->redirectToRoute('afficher_ctegorie');
        }

        if ($this->isGranted("ROLE_USER")){
            return $this->redirectToRoute('club');
        }

        if ($this->isGranted("ROLE_PARENT")){
            return $this->redirectToRoute('club');
        }

        if ($this->isGranted("ROLE_ELEVE")){
            return $this->redirectToRoute('club');
        }

        return $this->redirectToRoute('fos_user_security_login');
    }

}
