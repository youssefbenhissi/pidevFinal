<?php

namespace BibliothequebackBundle\Controller;

use BibliothequebackBundle\Entity\Category;
use BibliothequebackBundle\Entity\Livre;
use BibliothequebackBundle\Form\CategoryType;
use BibliothequebackBundle\Form\LivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function AjouterAction(Request $request)
    {
        $category = new Category();
        $form =$this->createForm(CategoryType::class,$category);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $category->uploadProfilePicture();
            $em->persist($category);
            $em->flush();
            //return $this->redirectToRoute('gf_affiche');
        }
        return $this->render('@Bibliothequeback/category/AjouterCat.html.twig', array('form'=>$form->createView()));
    }

    public function afficheAction(){
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository("BibliothequebackBundle:Category")->findAll();
        return $this->render('@Bibliothequeback/category/AfficheCat.html.twig', array('cats'=>$category));
    }

    public  function updateAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository(Category::class)->find($id);
        $form=$this->createForm(CategoryType::class,$category);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('bibliothequeback_afficheCat');
        }
        return $this->render('@Bibliothequeback/category/UpdateCat.html.twig', array('form'=>$form->createView()));


    }

    public function supprimerAction($id){
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository(Category::class)->find($id);
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('bibliothequeback_afficheCat');
    }

    public function categoryDetailsAction(Category $category,Request $request){

        $em=$this->getDoctrine()->getManager();
        $livre=new Livre();
        $con=$request->get('id');
        $category=$em->getRepository(Category::class)->find($con);
        $form =$this->createForm(LivreType::class,$livre);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            //$category->uploadProfilePicture();
            $livre->setCategory($category);
            $em->persist($livre);
            $em->flush();
            //return $this->redirectToRoute('gf_affiche');
        }

        $livres=$em->getRepository(Livre::class)->findAll();


        return $this->render('@Bibliothequeback/category/categorydetail.html.twig', [


            'category'=>$category,'form'=>$form->createView(),'livres'=>$livres
        ]);
    }
}
