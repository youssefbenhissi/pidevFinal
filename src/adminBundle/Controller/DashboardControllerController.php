<?php

namespace adminBundle\Controller;

use adminBundle\Entity\galerie;
use adminBundle\Entity\Mail;
use adminBundle\Form\galerieType;
use adminBundle\Form\MailType;
use EtablissementBundle\Entity\Etablissement;
use EtablissementBundle\Form\EtablissementType;
use EvenementBundle\Entity\categorieEvenement;
use EvenementBundle\Entity\Evenement;
use EvenementBundle\Entity\inscriptionEmail;
use EvenementBundle\Form\categorieEvenementType;
use gererClubBundle\Entity\Club;
use gererClubBundle\Entity\inscription;
use gererClubBundle\Entity\news;
use gererClubBundle\Form\categorieClubType;
use gererClubBundle\Form\ClubType;
use gererClubBundle\Form\inscriptionType;
use gererClubBundle\Form\newsType;
use Proxies\__CG__\gererClubBundle\Entity\categorieClub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use EvenementBundle\Entity\Reservation;
use EvenementBundle\Form\EvenementType;

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
        $user=$inscription->getEleve();
        $club=$inscription->getClub();
        $nom=$club->getNom();
        $email=$user->getEmail();
        $categorie=$this->getDoctrine()->getRepository(inscription::class)->find($id);
        $club=$categorie->getClub();
        $statut=$inscription->getStatus();
        $nb=$club->getCapacite();
        if($statut=="Approuvée")
        {
            $inscription->setStatus("non traitée");
            $club->setCapacite($nb+1);
            $this->getDoctrine()->getManager()->persist($inscription);
            $this->getDoctrine()->getManager()->persist($club);
            $this->getDoctrine()->getManager()->flush();
        }
        if($nb>1)
        {
            $club->setCapacite($nb-1);
            $message=\Swift_Message::newInstance()
                ->setSubject($nom)
                ->setFrom('youssef.benhissi@esprit.tn')
                ->setTo($email)
                ->setBody("on a approuvé votre inscription dans le club");
               $this->get('mailer')->send($message);
            $categorie->setStatus("Approuvée");
            $this->getDoctrine()->getManager()->persist($categorie);
            $this->getDoctrine()->getManager()->persist($club);
            $this->getDoctrine()->getManager()->flush();
        }
        else
        {
            $message=\Swift_Message::newInstance()
                ->setSubject($nom)
                ->setFrom('youssef.benhissi@esprit.tn')
                ->setTo($email)
                ->setBody("Nous sommes desoles. on a atteint la capacite maximale. Nous vous verrons tres prochainement");
            $this->get('mailer')->send($message);
        }
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
                $this->addFlash('success', 'Article Created! Knowledge is power!');
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
    
    public function exportAction()
    {
        $em= $this->getDoctrine()->getManager();
        $menus = $em->getRepository('gererClubBundle:inscription')->findAll();
        #Writer
        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(["questionPr",  "club",  "eleve" , "reponsePr"]);
        foreach ($menus as $menu) {
            $csv->insertOne([$menu->getQuestionPr(), $menu->getClub(), $menu->getEleve(), $menu->getReponsePr()]);
        }
        $csv->output('liste.csv');
        die();
    }
//partie Iheb

    public function afficherCategorieEvenementAction()
    {
        $E=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $Categorie=$this->getDoctrine()->getRepository(categorieEvenement::class)->findAll();
        return $this->render('@admin/DashboardController/afficherCategorieEvenement.html.twig',array('c'=>$E,"categorie"=>$Categorie));
    }
    public function supprimerCategorieEvenementAction($id)
    {
        $categorie = $this->getDoctrine()->getRepository(categorieEvenement::class)->find($id);
        $this->getDoctrine()->getManager()->remove($categorie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherCategorieEvenement');
    }

    public function supprimerEvenementAction($id)
    {
        $E = $this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $this->getDoctrine()->getManager()->remove($E);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherCategorieEvenement');
    }
//erreur belik
    function modifiercategorieEvenementAction($id,Request $request){



        $e=$this->getDoctrine()->getManager();
        $categorie=$e->getRepository(categorieEvenement::class)
            ->find($id);
        $Form=$this->createForm(categorieEvenementType::class,$categorie);
        $nom_initial = $categorie->getImage();
        $Form->handleRequest($request);

        if($Form->isSubmitted() && $Form->isValid())
        {
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $categorie->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($categorie);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCategorieEvenement');
            }
            $image = $categorie->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $categorie->setImage($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->flush();
            return $this->redirectToRoute('afficherCategorieEvenement');

        }
        return $this->render('@admin/DashboardController/modifierCategorieEvenement.html.twig',
            array('form'=>$Form->createView()));
    }
    function modifierEvenementAction($id,Request $request){

        $e=$this->getDoctrine()->getManager();
        $Evenement=$e->getRepository(Evenement::class)
            ->find($id);
        $Form=$this->createForm(EvenementType::class,$Evenement);
        $nom_initial = $Evenement->getImgE();
        $Form->handleRequest($request);
        if($Form->isSubmitted())
        {
            $verif=$Form->get('imgE')->getData();
            if($verif == null){

                $Evenement->setImgE($nom_initial);
                $this->getDoctrine()->getManager()->persist($Evenement);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCategorieEvenement');
            }
            $image = $Evenement->getImgE();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Evenement->setImgE($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->persist($Evenement);
            $e->flush();
            return $this->redirectToRoute('afficherCategorieEvenement');

        }
        return $this->render('@admin/DashboardController/modifierEvenement.html.twig',
            array('form'=>$Form->createView()));
    }
    public function ajouterCategorieEvenementAction(Request $request)
    {
        $Categorie=new categorieEvenement();
        $Form=$this->createForm(categorieEvenementType::class,$Categorie);

        $nom_initial = $Categorie->getImage();
        $Form->handleRequest($request);
        if($Form->isSubmitted()&&$Form->isValid())
        {
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $Categorie->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($Categorie);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCategorieEvenement');
            }
            $image = $Categorie->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Categorie->setImage($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->persist($Categorie);
            $e->flush();
            return $this->redirectToRoute('afficherCategorieEvenement');

        }
        return $this->render('@admin/DashboardController/ajouterCategorieEvenement.html.twig', array(
            "form"=>$Form->createView()
        ));
    }
    public function ajouterEvenementAction(Request $request)
    {
        $user = $this->getUser();
        $em=$this->getDoctrine()->getManager();
        $Evenement=new Evenement();
        $nom_initial = $Evenement->getImgE();
        $form=$this->createForm(EvenementType::class,$Evenement);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $verif=$form->get('imgE')->getData();
            if($verif == null){
                $Evenement->setIdUser($user);
                $Evenement->setImgE($nom_initial);
                $this->getDoctrine()->getManager()->persist($Evenement);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCategorieEvenement');
            }

            $Evenement->setIdUser($user);
            $image = $Evenement->getImgE();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Evenement->setImgE($name_image);
            $em=$this->getDoctrine()->getManager();
            $em->persist($Evenement);
            $em->flush();
            return $this->redirectToRoute('afficherCategorieEvenement');

        }
        return $this->render('@admin/DashboardController/ajouterEvenement.html.twig', array(
            "form"=>$form->createView()
        ));
    }
    public function envoyernewsletterAction(Request $request)
    {
        $new=new news();
        $formNews=$this->createForm(newsType::class,$new);
        $formNews->handleRequest($request);
        $listeEmail=$this->getDoctrine()->getRepository(inscriptionEmail::class)->findAll();
        if($formNews->isSubmitted())
        {

            foreach ($listeEmail as $Inc) {
                $email=$Inc->getEmail();
                $messge=$formNews->get('newsContenu')->getData();
                $message=\Swift_Message::newInstance()
                    ->setSubject("votre newsletter")
                    ->setFrom('youssef.benhissi@esprit.tn')
                    ->setTo($email)
                    ->setBody($messge);
                $this->get('mailer')->send($message);
            }
        }
        return $this->render('@admin/DashboardController/contact.html.twig', array(
            "form"=>$formNews->createView()
        ));
    }
    public function addEtablissementAction(Request $request)
    {
        $etablissement=new Etablissement();
        $form= $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em= $this->getDoctrine()->getManager();
            $file=$etablissement->getImage();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('image_directory'), $filename);
            $etablissement->setImage($filename);
            $em->persist($etablissement);
            $em->flush();


        }
        return $this->render('@admin/Admin/addE.html.twig',array(
            "Form"=>$form->createView()
        ));
    }
    public function BacklistEtablissementAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->findAll();
        return $this->render('@admin/Admin/BacklistE.html.twig',array(
            "Etablissement"=>$Etablissement
        ));
    }
    public function updateEtablissementAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $E=$em->getRepository('EtablissementBundle:Etablissement')->find($id);
        $form=$this->createForm(EtablissementType::class,$E);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $file=$E->getImage();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('image_directory'), $filename);
            $E->setImage($filename);
            $em=$this->getDoctrine()->getManager();
            $em->persist($E);
            $em->flush();
            return $this->redirectToRoute('Backlist_Etablissement');
        }
        return $this->render('@admin/Admin/updateE.html.twig',array(
            "form"=>$form->createView()
        ));
    }
    public function deleteEtablissementAction(Request $request)
    {
        $id = $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->find($id);
        $em->remove($Etablissement);
        $em->flush();
        return $this->redirectToRoute('Backlist_Etablissement');
    }

}