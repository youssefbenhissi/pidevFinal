<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\categorieEvenement;
use EvenementBundle\Entity\Evenement;
use EvenementBundle\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends Controller
{
    public function afficherAction($id,Request $request)
    {
        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM EvenementBundle:Evenement h');
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3
        );
        $Categorie=$this->getDoctrine()->getRepository(categorieEvenement::class)->find($id);
        return $this->render('@Evenement/Evenement/afficher.html.twig',array('c'=>$pagination,"categorie"=>$Categorie));
    }

    public function ajouterAction(Request $request)
    {
        $E=new Evenement();
        $form=$this->createForm(EvenementType::class,$E);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $this->getDoctrine()->getManager()->persist($E);
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->render('@Evenement/Evenement/ajouter.html.twig', array(
            "f"=>$form->createView()
        ));
    }

    function rechercherAction(Request $request){
        $E=new Evenement();
        $Form=$this->createFormBuilder($E)
            ->add('nomE')
            ->add('rechercher',SubmitType::class,
                ['attr'=>['formvalidate'=>'formvalidate']])
            ->getForm();
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $E=$this->getDoctrine()->getRepository(Evenement::class)->findBy(array('nomE'=>$E->getNomE()));
        }
        else{
            $E=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
        }
        return $this->render('@Evenement/Evenement/Recherche.html.twig',
            array('f'=>$Form->createView(),'c'=>$E));

    }
    function modifierAction($id,Request $request){

        $e=$this->getDoctrine()->getManager();
        $E=$e->getRepository(Evenement::class)
            ->find($id);
        $Form=$this->createForm(EvenementType::class,$E);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $e=$this->getDoctrine()->getManager();
            $e->flush();
            return $this->redirectToRoute('afficherCategorie');

        }
        return $this->render('@Evenement/Evenement/modifier.html.twig',
            array('form'=>$Form->createView()));
    }

    function supprimerAction($id){
        $e=$this->getDoctrine()->getManager();
        $E=$e->getRepository(Evenement::class)
            ->find($id);
        $e->remove($E);
        $e->flush();
        return $this->redirectToRoute('afficher');

    }
    public function afficherCategorieAction(Request $request)
    {
        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM EvenementBundle:categorieEvenement h');
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2
        );
        return $this->render('@Evenement/Evenement/affichercategorie.html.twig',
            array('pagination'=>$pagination
            ));
    }

    public function ajouterReservationAction(Request $request,$id)
    {
        $R=$this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $nb=$R->getCapaciteE();
        $R->setCapaciteE($nb-1);
        $this->getDoctrine()->getManager()->persist($R);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('affichercategorie');
    }

}
