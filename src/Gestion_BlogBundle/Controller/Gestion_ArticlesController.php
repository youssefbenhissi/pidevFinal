<?php

namespace Gestion_BlogBundle\Controller;

use Gestion_BlogBundle\Entity\Article;
use Gestion_BlogBundle\Entity\Categorie;
use Gestion_BlogBundle\Entity\tags;
use Gestion_BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
class Gestion_ArticlesController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $article = new Article();
        $Form=$this->createForm(ArticleType::class,$article)
            ->add('Ajouter',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $image=$article->getImage();
            $imageData = $Form->get('image')->getData();
            if($imageData == null) {


                $article->setImage('none');
                $article->setDate(new \DateTime('now'));
                $em->persist($article);
                $em->flush();
                return $this->redirectToRoute('gestion_blog_homepage_Admin');
            }
            $nom_image = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('images_articles_dossier'),
                $nom_image);

            $article->setImage($nom_image);
            $article->setDate(new \DateTime('now'));
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('gestion_blog_homepage_Admin');
        }
        return $this->render('@Gestion_Blog/Gestion_Articles/ajouter.html.twig',
            array('ajout_Form'=>$Form->createView()));

    }

    function Affiche_list_articleAction(Request $request){
    $article=$this->getDoctrine()
        ->getRepository(Article::class)
        ->findBy(array(), array('id' => 'desc'));

    return $this->render('@Gestion_Blog/Gestion_Articles/gestion_blog.html.twig',
        array('article'=>$article));
}

    function UpdateAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)
            ->find($id);
        $last_image_name = $article->getImage();
        $Form=$this->createForm(ArticleType::class,$article)
            ->add('Modifier',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $image = $article->getImage();
            $imageData = $Form->get('image')->getData();
            if($imageData == null){
                $article->setImage($last_image_name);
                $em=$this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('gestion_blog_homepage_Admin');
            }
                $nom_image = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_articles_dossier'),
                    $nom_image);

                 $article->setImage($nom_image);



            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion_blog_homepage_Admin');

        }
        return $this->render('@Gestion_Blog/Gestion_Articles/modifier.html.twig',
            array('form_edit'=>$Form->createView()));
    }

    function DeleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository(Article::class)
            ->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('gestion_blog_homepage_Admin');

    }


    // function display
    function Single_AfficheAction($id)
    {
$tag1=null;
$tag2=null;
$tag3=null;
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)
            ->find($id);
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        $category =$article->getCategorie();
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find($category);
        $alltags = $this->getDoctrine()
            ->getRepository(tags::class)
            ->findAll();
        if($article->getTag1() != null) {
            $tag1 = $this->getDoctrine()
                ->getRepository(tags::class)
                ->find($article->getTag1());
        }
        if($article->getTag2() != null){
            $tag2 = $this->getDoctrine()
                ->getRepository(tags::class)
                ->find($article->getTag2());
        }
        if($article->getTag3() != null){
            $tag3 = $this->getDoctrine()
                ->getRepository(tags::class)
                ->find($article->getTag3());
        }
        return $this->render('@Gestion_Blog/Gestion_Articles/affichage_single_article.twig',
            array('articlex'=>$article , 'categories'=>$categories, 'categorie'=>$categorie, 'alltags'=>$alltags, 'tag1'=>$tag1, 'tag2'=>$tag2, 'tag3'=>$tag3));
    }


    // function SEARCH POST
    function RechercheACtion(Request $request){
        $article=new Article();
        $Form=$this->createFormBuilder($article)
            ->add('titre')
            ->add('Rechercher',SubmitType::class,
                ['attr'=>['class'=>'btn btn-compose']])
            ->getForm();
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $article=$this->getDoctrine()
                ->getRepository(Article::class)
                ->findBy(array('titre'=>$article->getTitre()));
        }
        return $this->render('@Gestion_Blog/Gestion_Articles/recherche.html.twig',
            array('form_s'=>$Form->createView(),'article'=>$article));

    }
}
