<?php

namespace BlogBundle\Controller;

use Gestion_BlogBundle\Entity\Article;
use Gestion_BlogBundle\Entity\Categorie;
use Gestion_BlogBundle\Entity\tags;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $appointmentsRepository = $em->getRepository(Article::class);
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('a')
            ->where('a.type = 1')
            ->orderBy('a.date','DESC')
            ->getQuery();
        $paginator=$this->get('knp_paginator');
        $appointments = $paginator->paginate(
            $allAppointmentsQuery,
            $request->query->getInt('page', 1),
            9
        );
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('@Blog/Default/index.html.twig',
            array('categories'=>$categories,
                'appointments' => $appointments));
    }


    public function ParCatAction($id,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $appointmentsRepository = $em->getRepository(Article::class);
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('a')
            ->where('a.type = 1')
            ->andWhere('a.categorie = :cat')->orderBy('a.date','DESC')
            ->setParameter('cat', $id)
            ->getQuery();
        $paginator=$this->get('knp_paginator');
        $appointments = $paginator->paginate(
            $allAppointmentsQuery,
            $request->query->getInt('page', 1),
            9
        );

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find($id);
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();
        return $this->render('@Blog/Default/ArticleParCat.html.twig',
            array('appointments' => $appointments ,
                'categorie'=>$categorie,
                'categories'=>$categories));
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
        if($article->getCategorie() != null){
            $category =$article->getCategorie();
            $categorie = $this->getDoctrine()
                ->getRepository(Categorie::class)
                ->find($category);
        }

        $alltags = $this->getDoctrine()
            ->getRepository(tags::class)
            ->findAll();
        $article_update = $em->getRepository(Article::class)
            ->find($id);
        $nbr_vue = $article_update->getVues();
        $nbr_vue_update = $nbr_vue + 1 ;
        $article_update->setVues($nbr_vue_update);
        $em->persist($article);
        $em->flush();
        $tagsofarticle = $article->getTags();

        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT a
    FROM Gestion_BlogBundle:Article a
    WHERE a.type = 1
    ORDER BY a.vues DESC'
        );
        $article_populaire = $query->setMaxResults(5)->getResult();


        $query2 = $this->getDoctrine()->getManager()->createQuery('SELECT a
    FROM Gestion_BlogBundle:Article a
    WHERE a.categorie = :catsim
    AND a.type = 1
    ORDER BY a.id DESC')
            ->setParameter('catsim', $category->getId());
        $article_similaire = $query2->setMaxResults(5)->getResult();


        return $this->render('@Blog/Default/affichage_single_article.twig',
            array('articlex'=>$article ,
                'categories'=>$categories,
                'categorie'=>$categorie,
                'alltags'=>$alltags,
                'tagsofarticle'=>$tagsofarticle,
                'nbrvue'=>$nbr_vue_update,
                'articles_populaires'=>$article_populaire,
                'articles_similaires'=>$article_similaire));
    }

    public function PartagAction($id,Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $tag = $em
            ->getRepository(tags::class)
            ->find($id);
        $article = $tag->getArticles();
        foreach ($article as $key => $element){
            if($element->getType() == 0){
                unset($article[$key]);
            }
        }


        $paginator=$this->get('knp_paginator');
        $appointments = $paginator->paginate(
            $article,
            $request->query->getInt('page', 1),
            9
        );
        $tag = $this->getDoctrine()
            ->getRepository(tags::class)
            ->find($id);

        $tags = $this->getDoctrine()
            ->getRepository(tags::class)
            ->findAll();

        return $this->render('@Blog/Default/ArticlePartag.html.twig',
            array('appointments' => $appointments ,'tag'=>$tag,'tags'=>$tags));
    }

    public function searchajaxAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $posts =  $em->getRepository('Gestion_BlogBundle:Article')->findEntitiesByString($requestString);
        if(!$posts) {
            $result['posts']['error'] = "Pas de résultats !!";
        } else {
            $result['posts'] = $this->getRealEntities($posts);
        }
        return new Response(json_encode($result));
    }
    public function getRealEntities($posts){
        foreach ($posts as $posts){
            $realEntities[$posts->getId()] = [$posts->getImage(),$posts->getTitre()];

        }
        return $realEntities;
    }

}
