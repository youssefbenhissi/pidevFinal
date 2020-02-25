<?php

namespace Gestion_BlogBundle\Controller;




use Gestion_BlogBundle\Entity\tags;
use Gestion_BlogBundle\Form\tagsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class Gestion_tagsController extends Controller
{
    function indexAction(Request $request){
        $tags=$this->getDoctrine()
            ->getRepository(tags::class)
            ->findBy(array(), array('id' => 'desc'));

        return $this->render('@Gestion_Blog/Gestion_tags/gestion_tags_blog.html.twig',
            array('tags'=>$tags));
    }

    function ajoutAction(Request $request){

        $tag = new tags();
        $Form=$this->createForm(tagsType::class,$tag)
            ->add('Ajouter',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();
            return $this->redirectToRoute('Affiche_tags_admin');
        }
        return $this->render('@Gestion_Blog/Gestion_tags/ajouter_tag.html.twig',
            array('ajout_Form'=>$Form->createView()));

    }

    function UpdateAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $tag=$em->getRepository(tags::class)
            ->find($id);
        $Form=$this->createForm(tagsType::class,$tag)
            ->add('Modifier',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('Affiche_tags_admin');
        }
        return $this->render('@Gestion_Blog/Gestion_tags/modifier_tag.html.twig',
            array('form_edit'=>$Form->createView()));
    }

    function DeleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $tag=$em->getRepository(tags::class)
            ->find($id);
        $em->remove($tag);
        $em->flush();
        return $this->redirectToRoute('Affiche_tags_admin');

    }
    function RechercheACtion(Request $request){

        $terme = $request->get('terme');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT tag
    FROM Gestion_BlogBundle:tags tag
    WHERE tag.nom LIKE :terme
    ORDER BY tag.id DESC')->setParameter('terme', '%'.$terme.'%');
        $tags = $query->getResult();

        return $this->render('@Gestion_Blog/Gestion_tags/recherche.html.twig',
            array('tags'=>$tags));

    }
}
