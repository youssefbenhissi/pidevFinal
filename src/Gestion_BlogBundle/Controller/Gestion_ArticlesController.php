<?php

namespace Gestion_BlogBundle\Controller;

use Gestion_BlogBundle\Entity\Article;
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

$article ->setVues(0);

                $article->setImage('none');
                $article->setDate(new \DateTime('now'));
                $description1 = strip_tags($article->getContenu());
                $description_final = substr($description1,0,190);
                $article->setDescription($description_final);

                $em->persist($article);
                $em->flush();
                return $this->redirectToRoute('gestion_blog_homepage_Admin');
            }
            $nom_image = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('images_articles_dossier'),
                $nom_image);
            $article ->setVues(0);
            $article->setImage($nom_image);
            $article->setDate(new \DateTime('now'));
            $description1 = strip_tags($article->getContenu());
            $description_final = substr($description1,0,190);
            $article->setDescription($description_final);
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('gestion_blog_homepage_Admin');
        }
        return $this->render('@Gestion_Blog/Gestion_Articles/ajouter.html.twig',
            array('ajout_Form'=>$Form->createView()));

    }

    function Affiche_list_articleAction(Request $request){
        $ordrnom = null;
        $orddate = null;
        $ordvue = null;
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.id DESC '
        );

        $article = $query->setMaxResults(10)->getResult();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('count(Article.id)');
        $qb->from('Gestion_BlogBundle:Article','Article');

        $count = $qb->getQuery()->getSingleScalarResult();
$nbr = 10;


    return $this->render('@Gestion_Blog/Gestion_Articles/gestion_blog.html.twig',
        array('article'=>$article , 'nbrtotal'=>$count ,'nbr'=>$nbr,'ornom'=>$ordrnom,'ordate'=>$orddate,'ordvue'=>$ordvue ));
}

    function Affiche_list_articlenbrAction(Request $request){
        $nbr     = $request->get('nbr');
        $ordrnom = $request->get('ornom');
        $orddate = $request->get('ordate');
        $ordvue  = $request->get('ordvue');

        if($nbr =='all') {
            $nbr = null;
        }
        if($ordrnom != null && $ordrnom == 'desc') {
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.titre DESC'
            );
            $article = $query->setMaxResults($nbr)->getResult();
        }elseif ($ordrnom != null && $ordrnom == 'asc'){
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.titre ASC'
            );
            $article = $query->setMaxResults($nbr)->getResult();

        }elseif ($orddate != null && $orddate == 'desc'){
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.date DESC'
            );
            $article = $query->setMaxResults($nbr)->getResult();

        }elseif ($orddate != null && $orddate == 'asc'){
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.date ASC'
            );
            $article = $query->setMaxResults($nbr)->getResult();
        }elseif ($ordvue != null && $ordvue == 'asc'){
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.vues ASC'
            );
            $article = $query->setMaxResults($nbr)->getResult();
        }else{
            $query = $this->getDoctrine()->getManager()->createQuery(
                'SELECT a
    FROM Gestion_BlogBundle:Article a
    ORDER BY a.id DESC'
            );
            $article = $query->setMaxResults($nbr)->getResult();

        }




        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('count(Article.id)');
        $qb->from('Gestion_BlogBundle:Article','Article');

        $count = $qb->getQuery()->getSingleScalarResult();



        return $this->render('@Gestion_Blog/Gestion_Articles/gestion_blog.html.twig',
            array('article'=>$article ,'nbr'=>$nbr , 'nbrtotal'=>$count , 'ornom'=>$ordrnom,'ordate'=>$orddate,'ordvue'=>$ordvue));
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





    // function SEARCH POST
    function RechercheACtion(Request $request){

        $terme = $request->get('terme');
            /*$article=$this->getDoctrine()
                ->getRepository(Article::class)
                ->findBy(array('titre'=>$terme));*/

        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT a
    FROM Gestion_BlogBundle:Article a
    WHERE a.titre LIKE :terme
    ORDER BY a.id DESC')->setParameter('terme', '%'.$terme.'%');
        $article = $query->getResult();

        return $this->render('@Gestion_Blog/Gestion_Articles/recherche.html.twig',
            array('article'=>$article));

    }


}
