<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function adminAction()
    {


        return $this->render('@Admin/Default/index_admin.html.twig');
    }
}
