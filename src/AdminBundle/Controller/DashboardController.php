<?php

namespace AdminBundle\Controller;

use EvenementBundle\Entity\categorieEvenement;
use EvenementBundle\Entity\Evenement;
use EvenementBundle\Form\categorieEvenementType;
use EvenementBundle\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    public function afficherAction()
    {
        $E=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $Categorie=$this->getDoctrine()->getRepository(categorieEvenement::class)->findAll();
        return $this->render('@Admin/dashboard/afficher.html.twig',array('c'=>$E,"categorie"=>$Categorie));
    }
    public function supprimerCategorieAction($id)
    {
        $categorie = $this->getDoctrine()->getRepository(categorieEvenement::class)->find($id);
        $this->getDoctrine()->getManager()->remove($categorie);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherCat');
    }

    public function supprimerEvenementAction($id)
    {
        $E = $this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $this->getDoctrine()->getManager()->remove($E);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficherCat');
    }

    function modifiercategorieAction($id,Request $request){

        $e=$this->getDoctrine()->getManager();
        $categorie=$e->getRepository(categorieEvenement::class)
            ->find($id);
        $Form=$this->createForm(categorieEvenementType::class,$categorie);
        $nom_initial = $categorie->getImage();
        $Form->handleRequest($request);

        if($Form->isSubmitted())
        {
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $categorie->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($categorie);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCat');
            }
            $image = $categorie->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $categorie->setImage($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->flush();
            return $this->redirectToRoute('afficherCat');

        }
        return $this->render('@Admin/Dashboard/modifier.html.twig',
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
                return $this->redirectToRoute('afficherCat');
            }
            $image = $Evenement->getImgE();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Evenement->setImgE($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->persist($Evenement);
            $e->flush();
            return $this->redirectToRoute('afficherCat');

        }
        return $this->render('@Admin/Dashboard/modifierEvenement.html.twig',
            array('form'=>$Form->createView()));
    }
    public function ajouterCategorieAction(Request $request)
    {
        $Categorie=new categorieEvenement();
        $Form=$this->createForm(categorieEvenementType::class,$Categorie);

        $nom_initial = $Categorie->getImage();
        $Form->handleRequest($request);
        if($Form->isSubmitted())
        {
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $Categorie->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($Categorie);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCat');
            }
            $image = $Categorie->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Categorie->setImage($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->persist($Categorie);
            $e->flush();
            return $this->redirectToRoute('afficherCat');

        }
        return $this->render('@Admin/Dashboard/ajouterCategorie.html.twig', array(
            "form"=>$Form->createView()
        ));
    }
    public function ajouterEvenementAction(Request $request)
    {
        $e=$this->getDoctrine()->getManager();
        $Evenement=new Evenement();
        $nom_initial = $Evenement->getImgE();
        $form=$this->createForm(EvenementType::class,$Evenement);
        $form->handleRequest($request);
        if($form->isSubmitted()){$verif=$form->get('imgE')->getData();
            if($verif == null){

                $Evenement->setImgE($nom_initial);
                $this->getDoctrine()->getManager()->persist($Evenement);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherCat');
            }
            $image = $Evenement->getImgE();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $Evenement->setImgE($name_image);
            $e=$this->getDoctrine()->getManager();
            $e->persist($Evenement);
            $e->flush();
            return $this->redirectToRoute('afficherCat');

        }
        return $this->render('@Admin/Dashboard/ajouterEvenement.html.twig', array(
            "form"=>$form->createView()
        ));
    }

}
