<?php

namespace adminBundle\Controller;

use adminBundle\Entity\galerie;
use adminBundle\Entity\Mail;
use adminBundle\Form\galerieType;
use adminBundle\Form\MailType;
use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Form\categorieClubType;
use gererClubBundle\Form\ClubType;
use gererClubBundle\Form\inscriptionType;
use Proxies\__CG__\gererClubBundle\Entity\categorieClub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $nom_initial = $categorie->getImage();
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $verif=$form->get('image')->getData();
                if($verif == null)
                {
                    $categorie->setImage($nom_initial);
                    $this->getDoctrine()->getManager()->persist($categorie);
                    $this->getDoctrine()->getManager()->flush();
                    return $this->redirectToRoute('afficher_ctegorie');
                }
            $image = $categorie->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $categorie->setImage($name_image);
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
    public function modifierInscriptionAction($id)
    {
        $inscription=$this->getDoctrine()->getRepository(inscription::class)->find($id);
        $message=\Swift_Message::newInstance()
                ->setSubject("Acceptation de votre inscription")
                ->setFrom('youssef.benhissi@esprit.tn')
                ->setTo('youssef.benhissi@esprit.tn')
                ->setBody("on a approuvé votre inscription");
        $this->get('mailer')->send($message);
        $categorie=$this->getDoctrine()->getRepository(inscription::class)->find($id);
        $categorie->setStatus("Approuvée");
        $this->getDoctrine()->getManager()->persist($categorie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherAbonne');
    }
    public function ajouterClubAction(Request $request)
    {
        $club=new Club();
        $form=$this->createForm(ClubType::class,$club);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $image = $club->getImage();
            $image_data=$form->get('image')->getData();
            if($image_data == null){
                $club->setImage('none');
                $this->getDoctrine()->getManager()->persist($club);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficher_ctegorie');
            }
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $club->setImage($name_image);
            $this->getDoctrine()->getManager()->persist($club);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_ctegorie');
        }
        return $this->render('@admin/DashboardController/ajouterClub.html.twig', array("form"=>$form->createView()));
    }
    public function ajouterCategorieAction(Request $request)
    {
        $categorie=new \gererClubBundle\Entity\categorieClub();
        $form=$this->createForm(categorieClubType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $this->getDoctrine()->getManager()->persist($categorie);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_ctegorie');
        }
        return $this->render('@admin/DashboardController/ajouterCategorie.html.twig', array("form"=>$form->createView()));
    }
    public function testerEmailAction(Request $request)
    {
        $listeAbonne=$this->getDoctrine()->getRepository(inscription::class)->findAll();
        $snappy=$this->get('knp_snappy.pdf');
        $file_name="les inscription";
        $web="http://127.0.0.1:8000/afficherAbonne";
        return new Response(
            $snappy->getOutputFromHtml($this->renderView('@admin/DashboardController/afficherInscriptionPdf.html.twig',array("listeInscription"=>$listeAbonne))),
            200,
            array(
                'Content-Type'=>'application/pdf',
                'Content-Disposition'=>'attachement; filename="'.$file_name.'.pdf'
            )
        );
    }
    public function galerieAction(Request $request)
    {
        $galerie=new galerie();
        $form=$this->createForm(galerieType::class,$galerie);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $this->getDoctrine()->getManager()->persist($galerie);
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->render('@admin/DashboardController/gelerie.html.twig', array("form"=>$form->createView()));
    }

}
