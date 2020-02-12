<?php

namespace adminBundle\Controller;

use projetBundle\Entity\eleve;
use projetBundle\Entity\parents;
use projetBundle\Entity\personnel;
use projetBundle\Form\eleveType;
use projetBundle\Form\parentsType;
use projetBundle\Form\personnelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function afficherAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();
        $pa=$this->getDoctrine()
            ->getRepository(parents::class)
            ->findAll();
        $p=$this->getDoctrine()
            ->getRepository(personnel::class)
            ->findAll();
        return $this->render('@admin/Dashboard/afficher.html.twig', array('e'=>$e,'pa'=>$pa,'p'=>$p
            // ...
        ));
    }
    public function supprimerEAction($id)
    {
        $e=$this->getDoctrine()->getRepository(eleve::class)->find($id);
        $this->getDoctrine()->getManager()->remove($e);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');
    }
    public function supprimerPAction($id)
    {
        $p=$this->getDoctrine()->getRepository(parents::class)->find($id);
        $this->getDoctrine()->getManager()->remove($p);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');
    }
    public function supprimerPerAction($id)
    {
        $per=$this->getDoctrine()->getRepository(personnel::class)->find($id);
        $this->getDoctrine()->getManager()->remove($per);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');


}
    function modifierEAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(eleve::class)
            ->find($id);
        $Form=$this->createForm(eleveType::class,$c);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher');

        }
        return $this->render('@admin/Dashboard/modifierE.html.twig',
            array('form'=>$Form->createView()));
    }
    function modifierPAction(Request $request,$id){

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
        return $this->render('@admin/Dashboard/modifierP.html.twig',
            array('form'=>$Form->createView()));
    }
    function modifierPersonnelAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(personnel::class)
            ->find($id);
        $Form=$this->createForm(personnelType::class,$c);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher');

        }
        return $this->render('@admin/Dashboard/modifierPer.html.twig',
            array('form'=>$Form->createView()));
    }

    function ajouterEAction(Request $request){
        $e=new eleve();
        $Form=$this->createForm(eleveType::class,$e);
        $Form->add('Ajouter',SubmitType::class);

        $Form->handleRequest($request);
        $em=$this->getDoctrine()->getManager();
        if($Form->isSubmitted() && $Form->isValid()){
            $em->persist($e);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }

        return $this->render('@admin/Dashboard/ajouterE.html.twig',
            array('form'=>$Form->createView()));
    }


}
