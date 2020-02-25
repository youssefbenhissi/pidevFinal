<?php

namespace EtablissementBundle\Controller;

use EtablissementBundle\Entity\Etablissement;
use EtablissementBundle\Entity\Etablissementcomment;
use EtablissementBundle\Entity\Reclamation;
use EtablissementBundle\EtablissementBundle;
use EtablissementBundle\Form\EtablissementType;
use EtablissementBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class EtablissementController extends Controller
{

    public function listEtablissementAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->findAll();
        return $this->render('@Etablissement/Etablissement/listE.html.twig',array(
            "Etablissement"=>$Etablissement
        ));
    }



    public function showdetailedAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $E=$em->getRepository('EtablissementBundle:Etablissement')->find($id);
        return $this->render('@Etablissement/Etablissement/detailedE.html.twig',array(
        'Adresse'=>$E->getAdresse(),
        'Nom'=>$E->getNom(),
        'Image'=>$E->getImage(),
        'Telephone'=>$E->getNumTel(),
            'id'=>$E->getId(),
            'Etablissement'=>$E
        ));

    }
    public function searchAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $requestString=$request->get('q');
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->findEntitiesByString($requestString);
        if(!$Etablissement) {
            $result['Etablissement']['error'] = "School Not found :( ";
        }else{
        $result['Etablissement']=$this->getRealEntities($Etablissement);
        }
        return new Response(json_encode($result));
    }
    public function getRealEntities($Etablissement)
    {
        foreach ($Etablissement as $Etablissement){
            $realEntities[$Etablissement->getId()] = [$Etablissement->getImage(),$Etablissement->getNom()];
        }
        return $realEntities;
    }
    public function addCommentAction(Request $request,UserInterface $user)
    {
        $ref=$request->headers->get('referer');
        $etablissement=$this->getDoctrine()
            ->getRepository(Etablissement::class)
            ->findEtablissementByid($request->request->get('etablissement_id'));
        $comment=new Etablissementcomment();
        $comment->setUser($user);
        $comment->setEtablissement($etablissement);
        $comment->setContent($request->request->get('comment'));
        $comment->setPostedAt();
        $em=$this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        $this->addFlash('info','comment published');
        //return $this->redirect($ref);
        return new Response($comment->getId());


    }
    public function deleteCommentAction(Request $request)
    {
        $ref=$request->headers->get('referer');
        $id = $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $comment=$em->getRepository('EtablissementBundle:Etablissementcomment')->find($id);
        $em->remove($comment);
        $em->flush();
        return $this->redirect($ref);
    }
    public function addReclamationAction(Request $request,UserInterface $user,$id)
    {
        $reclamation=new Reclamation();
        $form= $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em= $this->getDoctrine()->getManager();
            $etablissement=$this->getDoctrine()
                ->getRepository(Etablissement::class)
                ->find($id);
            $reclamation->setUser($user);
            $reclamation->setEtablissement($etablissement);
            $reclamation->setDateRec(new \DateTime('now'));
            $em->persist($reclamation);
            $em->flush();
        }
        return $this->render('@Etablissement/Reclamation/addRec.html.twig',array(
            "Form"=>$form->createView()
        ));
    }
    public function listReclamationAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository('EtablissementBundle:Reclamation')->findAll();
        return $this->render('@Etablissement/reclamation/listRec.html.twig',array(
            "Etablissement"=>$reclamation
        ));
    }
    public function deleteReclamationAction(Request $request)
    {
        $id = $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository('EtablissementBundle:Reclamation')->find($id);
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute('list_reclamation');
    }
    public function updateReclamationAction(Request $request,UserInterface $user,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $R=$em->getRepository('EtablissementBundle:Reclamation')->find($id);
        $form= $this->createForm(ReclamationType::class, $R);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em= $this->getDoctrine()->getManager();
            $em->persist($R);
            $em->flush();
            return $this->redirectToRoute('list_reclamation');
        }
        return $this->render('@Etablissement/Reclamation/updateRec.html.twig',array(
            "form"=>$form->createView()
        ));
    }
}
