<?php

namespace Gestion_BlogBundle\Controller;

use Gestion_BlogBundle\Entity\Article;
use Gestion_BlogBundle\Entity\Categorie;
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
        return $this->render('@Gestion_Blog/Default/index.html.twig',
            array('article'=>$article ,'categories'=>$categories));
    }

    public function adminAction()
    {


        return $this->render('@Gestion_Blog/Default/index_admin.html.twig');
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
        return $this->render('@Gestion_Blog/Default/ArticleParCat.html.twig',
            array('article'=>$article ,'categorie'=>$categorie,'categories'=>$categories));
    }
}
