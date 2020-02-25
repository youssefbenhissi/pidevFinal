<?php

namespace projetBundle\Controller;

use projetBundle\Entity\demande;
use projetBundle\Entity\parents;
use projetBundle\Form\demandeType;
use projetBundle\Form\parentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class gestionController extends Controller
{
    public function afficherPAction()
    {
        /*$p=$this->getDoctrine()
            ->getRepository(parents::class)
            ->findAll();*/
        $em = $this->getDoctrine()->getEntityManager();
        $parent_id = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

        return $this->render('@projet/gestion/afficher.html.twig', array('p'=>$parent_id
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
            $em->persist($c);
            $em->flush();
            return $this->redirectToRoute('afficherP');

        }
        return $this->render('@projet/gestion/modifierParents.html.twig',
            array('f'=>$Form->createView()));
    }

    function demandeAction(Request $request){
        $demande = new demande();
        $em=$this->getDoctrine()->getManager();
        $Form=$this->createForm(demandeType::class,$demande);
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){
            $demande->setEtat("en cours");
            $demande->setParents($this->getUser());
            $em->persist($demande);
            $em->flush();
            return $this->redirectToRoute('mesdemandes');
        }
        return $this->render('@projet/demande/ajouter_demande.html.twig',
            array('f'=>$Form->createView()));
    }

    function mesdemandeAction(Request $request){
        $demande =$this->getDoctrine()
            ->getRepository(demande::class)
            ->getDemande();

        return $this->render('@projet/gestion/mes_demande.html.twig', array('demandes'=>$demande
        ));
    }

    public function GererDemandeAction(demande $demande,$token)
    {

        if($token=='Accepte')
        {
            $demande->setEtat('Accepté');
        }
        else
        {
            $demande->setEtat('Refusé');
        }
        $em = $this->getDoctrine()->getManager();

        $em->persist($demande);
        $em->flush();
        return $this->redirectToRoute('afficher_per');
    }
}
