<?php

namespace adminBundle\Controller;

use EtablissementBundle\Entity\Etablissement;
use EtablissementBundle\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserControllerController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if($user->isSuperAdmin())
            return $this->render('admin/base2.html.twig');
        else
            return $this->redirectToRoute('fos_user_security_login');
    }

    public function addEtablissementAction(Request $request)
    {
        $etablissement=new Etablissement();
        $form= $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em= $this->getDoctrine()->getManager();
            $file=$etablissement->getImage();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $etablissement->setImage($filename);
            $em->persist($etablissement);
            $em->flush();


        }
        return $this->render('@admin/Admin/addE.html.twig',array(
            "Form"=>$form->createView()
        ));
    }
    public function BacklistEtablissementAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->findAll();
        return $this->render('@admin/Admin/BacklistE.html.twig',array(
            "Etablissement"=>$Etablissement
        ));
    }
    public function updateEtablissementAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $E=$em->getRepository('EtablissementBundle:Etablissement')->find($id);
        $form=$this->createForm(EtablissementType::class,$E);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $file=$E->getImage();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $E->setImage($filename);
            $em=$this->getDoctrine()->getManager();
            $em->persist($E);
            $em->flush();
            return $this->redirectToRoute('Backlist_Etablissement');
        }
        return $this->render('@admin/Admin/updateE.html.twig',array(
            "form"=>$form->createView()
        ));
    }
    public function deleteEtablissementAction(Request $request)
    {
        $id = $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Etablissement=$em->getRepository('EtablissementBundle:Etablissement')->find($id);
        $em->remove($Etablissement);
        $em->flush();
        return $this->redirectToRoute('Backlist_Etablissement');
    }
}
