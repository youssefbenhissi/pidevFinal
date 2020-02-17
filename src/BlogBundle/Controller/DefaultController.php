<?php

namespace BlogBundle\Controller;

use Gestion_BlogBundle\Entity\Article;
use Gestion_BlogBundle\Entity\Categorie;
use Gestion_BlogBundle\Entity\tags;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $article=$this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(array(), array('id' => 'desc'));
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('@Blog/Default/index.html.twig',
            array('article'=>$article ,'categories'=>$categories));
    }


    public function ParCatAction($id)
    {
        $article=$this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(array('categorie' => $id));
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find($id);
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('@Blog/Default/ArticleParCat.html.twig',
            array('article'=>$article ,'categorie'=>$categorie,'categories'=>$categories));
    }

    // function display
    function Single_AfficheAction($id)
    {
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
        $tagsofarticle = $article->getTags();
        return $this->render('@Blog/Default/affichage_single_article.twig',
            array('articlex'=>$article , 'categories'=>$categories, 'categorie'=>$categorie, 'alltags'=>$alltags, 'tagsofarticle'=>$tagsofarticle));
    }

    public function PartagAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $tag = $this->getDoctrine()
            ->getRepository(tags::class)
            ->find($id);
        $article = $tag->getArticles();
        $tags = $this->getDoctrine()
            ->getRepository(tags::class)
            ->findAll();

        return $this->render('@Blog/Default/ArticlePartag.html.twig',
            array('article'=>$article ,'tag'=>$tag,'tags'=>$tags));
    }

}
