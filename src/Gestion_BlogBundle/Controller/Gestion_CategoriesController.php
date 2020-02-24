<?php

namespace Gestion_BlogBundle\Controller;





use Gestion_BlogBundle\Entity\Categorie;
use Gestion_BlogBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class Gestion_CategoriesController extends Controller
{
    function indexAction(Request $request){
        $categorie=$this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findBy(array(), array('id' => 'desc'));

        return $this->render('@Gestion_Blog/Gestion_Categories/gestion_categorie_blog.html.twig',
            array('cat'=>$categorie));
    }

    function ajoutAction(Request $request){

            $categorie = new Categorie();
            $Form=$this->createForm(CategorieType::class,$categorie)
                ->add('Ajouter',SubmitType::class);
            $Form->handleRequest($request);
            if($Form->isSubmitted() && $Form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                return $this->redirectToRoute('Gestion_Categorie_Admin');
            }
            return $this->render('@Gestion_Blog/Gestion_Categories/ajouter_categorie.html.twig',
                array('ajout_Form'=>$Form->createView()));

        }

    function UpdateAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Categorie::class)
            ->find($id);
        $Form=$this->createForm(CategorieType::class,$article)
            ->add('Modifier',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
                $em=$this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('Gestion_Categorie_Admin');
            }
        return $this->render('@Gestion_Blog/Gestion_Categories/modifier_categorie.html.twig',
            array('form_edit'=>$Form->createView()));
    }

    function DeleteAction($id){
        $em=$this->getDoctrine()->getManager();


        $query = $em->createQuery('SELECT c FROM Gestion_BlogBundle:Article c WHERE  c.categorie=:id ')
            ->setParameter('id',$id);
        $article = $query->getResult();
        foreach ($article as $arti) {
            $em->remove($arti);
            $em->flush();
        }

        $categorie=$em->getRepository(Categorie::class)
            ->find($id);
        $em->remove($categorie);

            $em->flush();



        return $this->redirectToRoute('Gestion_Categorie_Admin');

    }

    function RechercheACtion(Request $request){

        $terme = $request->get('terme');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT c
    FROM Gestion_BlogBundle:Categorie c
    WHERE c.nom LIKE :terme
    ORDER BY c.id DESC')->setParameter('terme', '%'.$terme.'%');
        $categorie = $query->getResult();

        return $this->render('@Gestion_Blog/Gestion_Categories/recherche.html.twig',
            array('categorie'=>$categorie));

    }





}
