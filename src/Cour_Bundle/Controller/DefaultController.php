<?php

namespace Cour_Bundle\Controller;
use Gestion_CoursBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $cours=$this->getDoctrine()
            ->getRepository(Cours::class)
            ->findBy(array(), array('id' => 'desc'));
        return $this->render('@Cour_/Default/index.html.twig',
            array('cours'=>$cours));

    }

    public function readAction($id)
    {
        $cour = $this->getDoctrine()
            ->getRepository(Cours::class)
            ->find($id);
        $cour = '../../pdf/'.$cour->getPathPdf();
        return $this->redirect($cour);
    }

}
