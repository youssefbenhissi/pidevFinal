<?php

namespace projetBundle\Controller;

use projetBundle\Entity\eleve;
use projetBundle\Form\eleveType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class eleveController extends Controller
{
    public function afficherEleveAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();

        return $this->render('@projet/eleve/afficher.html.twig', array('e'=>$e
            // ...
        ));
    }
    function modifierEleveAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(eleve::class)
            ->find($id);
        $Form=$this->createForm(eleveType::class,$c);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficherEleve');

}
        return $this->render('@projet/eleve/modifierEleve.html.twig',
            array('f'=>$Form->createView()));
    }
    function SupprimerEleveAction($id){
        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(eleve::class)
            ->find($id);
        $em->remove($c);
        $em->flush();
        return $this->redirectToRoute('afficherEleve');


    }}
