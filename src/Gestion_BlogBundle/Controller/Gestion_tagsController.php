<?php

namespace Gestion_BlogBundle\Controller;

use Gestion_BlogBundle\Entity\tags;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}
