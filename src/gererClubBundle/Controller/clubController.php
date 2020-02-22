<?php

namespace gererClubBundle\Controller;

use gererClubBundle\Entity\categorieClub;
use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Entity\commantaire;
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
        $queryTop=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM gererClubBundle:Club h ORDER BY h.moyenneLike DESC')->setMaxResults(3);
        $top3=$queryTop->execute();
        $listeCategories=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();

        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM gererClubBundle:Club h');
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3
        );
        return $this->render('@gererClub/club/clubs.html.twig',array("liste"=>$listeCategories,"listeCl"=>$pagination,"top3"=>$top3));
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
        $user=$this->container->get('security.token_storage')->getToken()->getUser();
        $id=$user->getId();
        $eleve=$this->getDoctrine()->getRepository(eleve::class)->find($id);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $inscription->setClub($club);
            $inscription->setEleve($user);
            $this->getDoctrine()->getManager()->persist($inscription);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("club");
        }
        return $this->render('@gererClub/club/inscription.html.twig',array("form"=>$form->createView(),"club"=>$club,"inscription"=>$inscription));
    }
    public function galerieAction()
    {
        $clubs=$this->getDoctrine()->getRepository(Club::class)->findAll();
        $photos=$this->getDoctrine()->getRepository('adminBundle:galerie')->findAll();
        return $this->render('@gererClub/club/galerie.html.twig',array("clubs"=>$clubs,"photos"=>$photos));
    }    
    public function sendNotificationAction(Request $request)
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        return $this->redirectToRoute('afficher_ctegorie');
    }
    public function ajouterUneEtoileAction($id,$nombre,Request $request){
        $queryTop=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM gererClubBundle:Club h ORDER BY h.moyenneLike DESC')->setMaxResults(3);
        $top3=$queryTop->execute();
        $club=$this->getDoctrine()->getRepository(Club::class)->find($id);
        $nbrLike=$club->getNbrLike();
        $nbrFoisLike=$club->getNbrFoisLike();
        $nbrLike=$nbrLike+$nombre;
        $nbrFoisLike=$nbrFoisLike+1;
        $moyenne=$nbrLike/$nbrFoisLike;
        $club->setMoyenneLike($moyenne);
        $club->setNbrLike($nbrLike);
        $club->setNbrFoisLike($nbrFoisLike);
        $this->getDoctrine()->getManager()->persist($club);
        $this->getDoctrine()->getManager()->flush();
        $listeCategories=$this->getDoctrine()->getRepository(categorieClub::class)->findAll();
        $pagination=$this->getDoctrine()->getRepository(Club::class)->findAll();
        $query=$this->getDoctrine()->getManager()->createQuery('SELECT h FROM gererClubBundle:Club h');
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('@gererClub/club/clubs.html.twig',array("liste"=>$listeCategories,"listeCl"=>$pagination,'top3'=>$top3));

    }
    public function ajouterCommantaireAction($id){
        $commantaire=new commantaire();
        $club=$this->getDoctrine()->getRepository(Club::class)->find($id);

    }
    
}
