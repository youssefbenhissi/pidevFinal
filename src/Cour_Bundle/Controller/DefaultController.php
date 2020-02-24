<?php

namespace Cour_Bundle\Controller;
use Gestion_CoursBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nzo\FileDownloaderBundle\FileDownloader\FileDownloader;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $cours=$this->getDoctrine()
            ->getRepository(Cours::class)
            ->findBy(array(), array('id' => 'desc'));
        return $this->render('@Cour_/Default/index.html.twig',
            array('cours'=>$cours));

    }

    public function readAction($id)
    {
        $cour = $this->getDoctrine()
            ->getRepository(Cours::class)
            ->find($id);
        $em=$this->getDoctrine()->getManager();
        $nbr_vue = $cour->getVues();
        $nbr_vue_update = $nbr_vue + 1 ;
        $cour->setVues($nbr_vue_update);
        $em->persist($cour);
        $em->flush();


        return $this->get('nzo_file_downloader')->readFile('/pdf/'.$cour->getPathPdf());
    }
    public function downloadAction($id)
    {
        $cour = $this->getDoctrine()
            ->getRepository(Cours::class)
            ->find($id);
        $em=$this->getDoctrine()->getManager();
        $nbr_vue = $cour->getTelenbr();
        $nbr_vue_update = $nbr_vue + 1 ;
        $cour->setTelenbr($nbr_vue_update);
        $em->persist($cour);
        $em->flush();
        return $this->get('nzo_file_downloader')->downloadFile('/pdf/'.$cour->getPathPdf());
    }



}
