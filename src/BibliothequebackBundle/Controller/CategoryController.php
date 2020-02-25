<?php

namespace BibliothequebackBundle\Controller;

use BibliothequebackBundle\Entity\Category;
use BibliothequebackBundle\Entity\Livre;
use BibliothequebackBundle\Entity\Commentaire;
use BibliothequebackBundle\Form\CategoryType;
use BibliothequebackBundle\Form\CommentaireType;
use BibliothequebackBundle\Form\LivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
            $category->uploadProfilePicture();
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
            $livre->uploadProfilePicture();

            $em->persist($livre);
            $em->flush();
            //return $this->redirectToRoute('gf_affiche');
        }

        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT l
    FROM BibliothequebackBundle:Livre l
    WHERE l.category = :cat'
        )->setParameter('cat', $con);
        $livres = $query->getResult();


        return $this->render('@Bibliothequeback/category/categorydetail.html.twig', [


            'category'=>$category,'form'=>$form->createView(),'livres'=>$livres
        ]);
    }

    public function afficheCatFrontAction(){
        $em=$this->getDoctrine()->getManager();
        $category=$em->getRepository("BibliothequebackBundle:Category")->findAll();
        return $this->render('@Bibliothequeback/Category/AfficheCatFront.html.twig', array('cats'=>$category));
    }

    public function categoryDetailsFrontAction(Category $category,Request $request){

        $em=$this->getDoctrine()->getManager();
        $livre=new Livre();
        $con=$request->get('id');
        $category=$em->getRepository(Category::class)->find($con);
        

        $livres=$em->getRepository(Livre::class)->findAll();


        return $this->render('@Bibliothequeback/category/categorydetailfront.html.twig', [


            'category'=>$category,'livres'=>$livres
        ]);
    }


    public function livreDetailsFrontAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $categorie=$this->getDoctrine()->getRepository(Category::class)->find($id);
        $livres=$this->getDoctrine()->getRepository(Livre::class)->findAll();

        /*
                 $commentaire=new Commentaire();
         $commentaire->setDatecreate(new \DateTime('now'));
        $form =$this->createForm(CommentaireType::class,$commentaire);
        $form->handleRequest($request);
        if($form->isValid()){

            $em=$this->getDoctrine()->getManager();
            //$category->uploadProfilePicture();

            $commentaire->setLivre($livre);

            $em->persist($commentaire);
            $em->flush();
            //return $this->redirectToRoute('gf_affiche');
        }*/
        $commentaires=$em->getRepository(Commentaire::class)->findAll();

      //  $livres=$em->getRepository(Livre::class)->findAll();
        $cartegories=$em->getRepository(Category::class)->findAll();


        return $this->render('@Bibliothequeback/category/livredetailfront.html.twig', [


            'categorie'=>$categorie,'livres'=>$livres,'form'=>$form->createView(),'commentaires'=>$commentaires//,'nbr'=>$nbr,
        ]);
    }


   /* public function allCommentaireAction(Livre $livre,Request $request){

        $em=$this->getDoctrine()->getManager();
        $commentaire=new Commentaire();
        $con=$request->get('id');
        $livre=$em->getRepository(Livre::class)->find($con);
        $form =$this->createForm(CommentaireType::class,$commentaire);
        $form->handleRequest($request);
        if($form->isValid()){

            $em=$this->getDoctrine()->getManager();
            

            $commentaire->setLivre($livre);

            $em->persist($commentaire);
            $em->flush();
            
        }
        $commentaires=$em->getRepository(Commentaire::class)->findAll();

      
        $cartegories=$em->getRepository(Category::class)->findAll();
$response = new Response();
$content =json_encode($livre);
$response->setContent($content);
return $response; */

        //return $this->render('@Bibliothequeback/category/livredetailfront.html.twig', [


      //    'livre'=>$livre,'categories'=>$cartegories,'form'=>$form->createView(),'commentaires'=>$commentaires,'nbr'=>$nbr,
 //]);
 
 //   }
    public function exportAction(){
        $em=  $this->getDoctrine()->getManager();
        $categories=$em->getRepository(Category::class)->findAll();
        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['id', 'libelle','description']);

        foreach ($categories as $category){
            $csv->insertOne([$category->getId(), $category->getLibelle(), $category->getDescription()]);
        }
        $csv->output('categories.csv');

        die('export');
    }
}