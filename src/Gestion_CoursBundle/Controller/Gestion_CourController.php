<?php

namespace Gestion_CoursBundle\Controller;


use Gestion_CoursBundle\Entity\Cours;
use Gestion_CoursBundle\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class Gestion_CourController extends Controller
{
    function indexAction(Request $request){
        $Cours=$this->getDoctrine()
            ->getRepository(Cours::class)
            ->findBy(array(), array('id' => 'desc'));

        return $this->render('@Gestion_Cours/Gestion_Cours/gestion_Cours.html.twig',
            array('cat'=>$Cours));
    }

    public function ajouterAction(Request $request)
    {
        $cour = new Cours();
        $Form=$this->createForm(CoursType::class,$cour)
            ->add('Ajouter',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){
            $cour->setVues(0);
            $cour->setTelenbr(0);
            $em=$this->getDoctrine()->getManager();
            $pdf=$cour->getPathPdf();
            $pdfData = $Form->get('pathPdf')->getData();
            if($pdfData == null) {


                $cour->setPathPdf('none');
                $em->persist($cour);
                $em->flush();
                return $this->redirectToRoute('gestion.cours_homepage');
            }
            $nom_pdf = md5(uniqid()) . '.' . $pdf->guessExtension();
            $pdf->move(
                $this->getParameter('pdf_dossier'),
                $nom_pdf);

            $cour->setPathPdf($nom_pdf);
            $em->persist($cour);
            $em->flush();
            return $this->redirectToRoute('gestion.cours_homepage');
        }
        return $this->render('@Gestion_Cours/Gestion_Cours/ajouter.html.twig',
            array('ajout_Form'=>$Form->createView()));

    }

    function UpdateAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $cour=$em->getRepository(Cours::class)
            ->find($id);
        $last_pdf_name = $cour->getPathPdf();
        $Form=$this->createForm(CoursType::class,$cour)
            ->add('Modifier',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){

            $pdf = $cour->getPathPdf();
            $pdfData = $Form->get('pathPdf')->getData();
            if($pdfData == null){
                $cour->setPathPdf($last_pdf_name);
                $em=$this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('gestion.cours_homepage');
            }
            $nom_pdf = md5(uniqid()) . '.' . $pdf->guessExtension();
            $pdf->move(
                $this->getParameter('pdf_dossier'),
                $nom_pdf);

            $cour->setPathPdf($nom_pdf);



            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('gestion.cours_homepage');

        }
        return $this->render('@Gestion_Cours/Gestion_Cours/modifier.html.twig',
            array('form_edit'=>$Form->createView()));
    }

    function DeleteAction($id){
        $em=$this->getDoctrine()->getManager();
        $cour=$em->getRepository(Cours::class)
            ->find($id);
        $em->remove($cour);
        $em->flush();
        return $this->redirectToRoute('gestion.cours_homepage');

    }

    function RechercheACtion(Request $request){

        $terme = $request->get('terme');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT cour
    FROM Gestion_CoursBundle:Cours cour
    WHERE cour.nom LIKE :terme
    ORDER BY cour.id DESC')->setParameter('terme', '%'.$terme.'%');
        $cours = $query->getResult();

        return $this->render('@Gestion_Cours/Gestion_Cours/recherche.html.twig',
            array('cours'=>$cours));

    }
}
