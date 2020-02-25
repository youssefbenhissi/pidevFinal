<?php

namespace projetBundle\Controller;

use projetBundle\Entity\eleve;
use projetBundle\Form\eleveType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class eleveController extends Controller
{
    public function afficherEleveAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();
        $eleve_id = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        return $this->render('@projet/eleve/afficherE.html.twig', array('e'=>$e,'elid'=>$eleve_id
        ));
    }
    function modifierEleveAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(eleve::class)
            ->find($id);
        $Form=$this->createForm(eleveType::class,$c);
        $Form->handleRequest($request);
        if($Form->isSubmitted()&& $Form->isValid()){
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


    }
    function RechercheAction(Request $request){
        $eleve=new eleve();
        $Form=$this->createFormBuilder($eleve)
            ->add('nom')
            ->add('Recherche',SubmitType::class,
                ['attr'=>['formvalidate'=>'formvalidate']])
            ->getForm();
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $eleve=$this->getDoctrine()->getRepository(eleve::class)->findBy(array('adressMail'=>$eleve->getAdressMail()));
        }
        return $this->render('@projet/eleve/Recherche.html.twig',
            array('f'=>$Form->createView(),'e'=>$eleve));

    }

    public function afficherstatAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();

        return $this->render('@admin/Dashboard/stat.html.twig', array(/*'e'=>$e,'elid'=>$eleve_id
       */ ));
    }




}
