<?php

namespace gererClubBundle\Controller;

use gererClubBundle\Entity\categorieClub;
use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Form\inscriptionType;
use Knp\Component\Pager\PaginatorInterface;
use Proxies\__CG__\gererClubBundle\Entity\eleve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAwareInterface;

class clubController extends Controller
{
    public function afficherAction(Request $request)
    {
        $listeCategories=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();
        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM gererClubBundle:Club h');
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            1
        );
        return $this->render('@gererClub/club/list.html.twig',array("liste"=>$listeCategories,"pagination"=>$pagination));
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
        $question1=$club->getQuestionPr();
        $question2=$club->getQuestionDe();
        $question3=$club->getQuestionTr();
        $inscription->setQuestionPr($question1);
        $inscription->setQuestionDe($question2);
        $inscription->setQuestionTr($question3);
        $form=$this->createForm(inscriptionType::class,$inscription);
        $eleve=$this->getDoctrine()->getRepository(\gererClubBundle\Entity\eleve::class)->find("31");
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $inscription->setClub($club);
            $inscription->setEleve($eleve);
            $this->getDoctrine()->getManager()->persist($inscription);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("club");
        }
        return $this->render('@gererClub/club/inscription.html.twig',array("form"=>$form->createView(),"club"=>$club,"inscription"=>$inscription));
    }
}