<?php

namespace projetBundle\Controller;

use projetBundle\Entity\personnel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class personnelController extends Controller
{
    public function afficherPersonnelAction()
    {
        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM projetBundle:personnel h WHERE (h.type LIKE :max )')->setParameter('max',"enseignant");
        $query->execute();
        $personnel= $query->getresult();

        return $this->render('@projet/personnel/afficher_personnel.html.twig', array('p'=>$personnel));
    }

}
