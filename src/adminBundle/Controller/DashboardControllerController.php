<?php

namespace adminBundle\Controller;

use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Form\categorieClubType;
use gererClubBundle\Form\ClubType;
use gererClubBundle\Form\inscriptionType;
use Proxies\__CG__\gererClubBundle\Entity\categorieClub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardControllerController extends Controller
{
    public function afficherCtegorieAction()
    {
        $listeCatgeorie=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();
        $listeDesClub=$this->getDoctrine()->getRepository(Club::class)->findAll();
        return $this->render('@admin/DashboardController/afficher_ctegorie.html.twig', array("listeCa"=>$listeCatgeorie,"listeCl"=>$listeDesClub));
    }
    public function supprimerCategorieAction($id)
    {
        $categorie=$this->getDoctrine()->getRepository(categorieClub::class)->find($id);
        $this->getDoctrine()->getManager()->remove($categorie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_ctegorie');
    }
    public function supprimerClubAction($id)
    {
        $club=$this->getDoctrine()->getRepository(Club::class)->find($id);
        $this->getDoctrine()->getManager()->remove($club);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_ctegorie');
    }
    public function modifierCategorieAction(Request $request,$id)
    {
        $categorie=$this->getDoctrine()->getRepository(categorieClub::class)->find($id);
        $form=$this->createForm(categorieClubType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->getDoctrine()->getManager()->persist($categorie);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_ctegorie');
        }
        return $this->render('@admin/DashboardController/modifierCategorie.html.twig', array("form"=>$form->createView()));
    }
    public function modifierClubAction(Request $request,$id)
    {
        $categorie=$this->getDoctrine()->getRepository(Club::class)->find($id);
        $form=$this->createForm(ClubType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->getDoctrine()->getManager()->persist($categorie);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_ctegorie');
        }
        return $this->render('@admin/DashboardController/modifierClub.html.twig', array("form"=>$form->createView()));
    }
    public function afficherAbonneAction()
    {
        $listeAbonne=$this->getDoctrine()->getRepository(inscription::class)->findAll();
        return $this->render('@admin/DashboardController/afficherInscription.html.twig', array("listeInscription"=>$listeAbonne));
    }
    public function supprimerInscriptionAction($id)
    {
        $club=$this->getDoctrine()->getRepository(inscription::class)->find($id);
        $this->getDoctrine()->getManager()->remove($club);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherAbonne');
    }
    public function modifierInscriptionAction(Request $request,$id)
    {
        $categorie=$this->getDoctrine()->getRepository(inscription::class)->find($id);
        $form=$this->createForm(inscriptionType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->getDoctrine()->getManager()->persist($categorie);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficherAbonne');
        }
        return $this->render('@admin/DashboardController/modifierInscription.html.twig', array("form"=>$form->createView()));
    }
}
