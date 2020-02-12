<?php

namespace projetBundle\Controller;

use projetBundle\Entity\parents;
use projetBundle\Form\parentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class gestionController extends Controller
{
    public function afficherAction()
    {
        $p=$this->getDoctrine()
            ->getRepository(parents::class)
            ->findAll();
        
        return $this->render('@projet/gestion/afficher.html.twig', array('p'=>$p
            // ...
        ));
    }
    function ajouterParentsAction(Request $request){
        $p=new parents();
        $Form=$this->createForm(parentsType::class,$p);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
        }
        return $this->render('@projet/gestion/AjoutParents.html.twig',
            array('f'=>$Form->createView()));

}
    function SupprimerParentsAction($id){
        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(parents::class)
            ->find($id);
        $em->remove($c);
        $em->flush();
        return $this->redirectToRoute('afficher');



}
    function modifierParentsAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(parents::class)
            ->find($id);
        $Form=$this->createForm(parentsType::class,$c);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher');

        }
        return $this->render('@projet/gestion/modifierParents.html.twig',
            array('f'=>$Form->createView()));
    }
}
