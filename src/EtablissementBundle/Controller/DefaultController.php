<?php

namespace EtablissementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->isGranted("ROLE_ADMIN")){
            return $this->redirectToRoute('admin_homepage');
        }

        if ($this->isGranted("ROLE_USER")){
            return $this->redirectToRoute('club');
        }

        return $this->redirectToRoute('fos_user_security_login');
    }
}
