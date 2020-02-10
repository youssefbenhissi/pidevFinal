<?php

namespace gererClubBundle\Controller;

use gererClubBundle\Entity\categorieClub;
use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Form\inscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class clubController extends Controller
{
    public function afficherAction()
    {
        $listeCategories=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();
        $listeClubs=$this->getDoctrine()->getRepository(Club::class)->findAll();
        return $this->render('@gererClub/club/clubs.html.twig',array("liste"=>$listeCategories,"listeCl"=>$listeClubs));
    }
    public function afficherClubSelonClubAction($id)
    {
        $listeClub=$this->getDoctrine()->getRepository(Club::class)->findAll();
        $listeCategories=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();
        return $this->render('@gererClub/club/afficherClub.html.twig',array("id"=>$id,"listeClub"=>$listeClub,"listeCategories"=>$listeCategories));
    }
    public function inscriptionAction(Request $request,$id)
    {
        $club=$this->getDoctrine()->getRepository(Club::class)->find($id);
        $inscription=new inscription();
        $inscription->setClub($club);
        $form=$this->createForm(inscriptionType::class,$inscription);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->getDoctrine()->getManager()->persist($inscription);
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->render('@gererClub/club/inscription.html.twig',array("form"=>$form->createView(),"club"=>$club));
    }
}
