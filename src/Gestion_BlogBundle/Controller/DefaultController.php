<?php

namespace Gestion_BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function adminAction()
    {


        return $this->render('@Gestion_Blog/Default/index_admin.html.twig');
    }



}
