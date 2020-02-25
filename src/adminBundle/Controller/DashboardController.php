<?php

namespace adminBundle\Controller;

use projetBundle\Entity\demande;
use projetBundle\Entity\eleve;
use projetBundle\Entity\parents;
use projetBundle\Entity\personnel;
use projetBundle\Form\eleveType;
use projetBundle\Form\parentsType;
use projetBundle\Form\personnelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{

    public function afficherstatAction()
    {

        $stat =$this->getDoctrine()
            ->getRepository(eleve::class)
            ->getstat();
        return $this->render('@admin/Dashboard/stat.html.twig',
            array('stat'=>$stat
                // ...
            ));
    }
    public function afficherAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();
        $pa=$this->getDoctrine()
            ->getRepository(parents::class)
            ->findAll();
        $p=$this->getDoctrine()
            ->getRepository(personnel::class)
            ->findAll();
        $demande =$this->getDoctrine()
            ->getRepository(demande::class)
            ->getDemande();
        return $this->render('@admin/Dashboard/afficher.html.twig',
            array('e'=>$e,'pa'=>$pa,'p'=>$p,'de'=>$demande
            // ...
        ));
    }
    public function affichereleveAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(eleve::class)
            ->findAll();

        return $this->render('@admin/Dashboard/afficher_eleves.html.twig',
            array('e'=>$e));
    }
    public function afficherparentsAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(parents::class)
            ->findAll();

        return $this->render('@admin/Dashboard/afficher_parents.html.twig',
            array('pa'=>$e));
    }
    public function afficherpersoAction()
    {
        $e=$this->getDoctrine()
            ->getRepository(personnel::class)
            ->findAll();

        return $this->render('@admin/Dashboard/afficher_person.html.twig',
            array('p'=>$e));
    }

    public function supprimerEAction($id)
    {
        $e=$this->getDoctrine()->getRepository(eleve::class)->find($id);
        $this->getDoctrine()->getManager()->remove($e);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');
    }
    public function supprimerPAction($id)
    {
        $p=$this->getDoctrine()->getRepository(parents::class)->find($id);
        $this->getDoctrine()->getManager()->remove($p);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');
    }
    public function supprimerPerAction($id)
    {
        $per=$this->getDoctrine()->getRepository(personnel::class)->find($id);
        $this->getDoctrine()->getManager()->remove($per);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('afficher_per');


}
    function modifierEAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(eleve::class)
            ->find($id);
        $Form=$this->createForm(eleveType::class,$c);
        $Form->handleRequest($request);
        $nom_initial = $c->getImage();
        if($Form->isSubmitted()){

            $verif=$Form->get('image')->getData();
            if($verif == null){

                $c->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($c);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('afficherEleve');
            }
            $image = $c->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $c->setImage($name_image);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('admin_homepage');

        }
        return $this->render('@admin/Dashboard/modifierE.html.twig',
            array('form'=>$Form->createView()));
    }
    function modifierPAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(parents::class)
            ->find($id);
        $Form=$this->createForm(parentsType::class,$c);
        $Form->handleRequest($request);
        $nom_initial = $c->getImage();
        if($Form->isSubmitted()){
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $c->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($c);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_homepage');
            }
            $image = $c->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $c->setImage($name_image);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('admin_homepage');

        }
        return $this->render('@admin/Dashboard/modifierP.html.twig',
            array('form'=>$Form->createView()));
    }
    function modifierPersonnelAction(Request $request,$id){

        $em=$this->getDoctrine()->getManager();
        $c=$em->getRepository(personnel::class)
            ->find($id);
        $Form=$this->createForm(personnelType::class,$c);
        $Form->handleRequest($request);
        $nom_initial = $c->getImage();
        if($Form->isSubmitted()){
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $c->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($c);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_homepage');
            }
            $image = $c->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $c->setImage($name_image);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('admin_homepage');

        }
        return $this->render('@admin/Dashboard/modifierPer.html.twig',
            array('form'=>$Form->createView()));
    }

    function ajouterEAction(Request $request){
        $e=new eleve();
        $Form=$this->createForm(eleveType::class,$e);
        $nom_initial = $e->getImage();
        $Form->handleRequest($request);
        $em=$this->getDoctrine()->getManager();
        if($Form->isSubmitted() && $Form->isValid()){$message = \Swift_Message::newInstance()
            ->setSubject('inscription est validée')
            ->setFrom('mustapha.feriani1@esprit.tn')
            ->setTo('mustapha.feriani1@esprit.tn')
            ->setBody("mail confirmé");
            $this->get('mailer')->send($message);

            $verif=$Form->get('image')->getData();
            if($verif == null){

                $e->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($e);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_home');
            }
            $image = $e->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $e->setImage($name_image);
            $this->getDoctrine()->getManager()->persist($e);
            $this->getDoctrine()->getManager()->flush();
            $msg="L'inscription de votre enfant ".$e->getNom()." est valider";
            $tel='+216'.$e->getParents()->getNumTelephone();
            $twilio = $this->get('twilio.api');

            $message = $twilio->account->messages->sendMessage(
                '+12013081769', // From a Twilio number in your account
                $tel, // Text any number
                $msg
            );

            //get an instance of \Service_Twilio
            $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');


            return $this->redirectToRoute('admin_home');
        }

        return $this->render('@admin/Dashboard/ajouterE.html.twig',
            array('form'=>$Form->createView()));
    }
    function ajouterPAction(Request $request){
        $p=new parents();
        $Form=$this->createForm(parentsType::class,$p);
        $Form->add('Envoyer',SubmitType::class);

        $Form->handleRequest($request);
        $nom_initial = $p->getImage();
        $em=$this->getDoctrine()->getManager();
        if($Form->isSubmitted() && $Form->isValid()){
            $verif=$Form->get('image')->getData();
            if($verif == null){

                $p->setImage($nom_initial);
                $this->getDoctrine()->getManager()->persist($p);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_homepage');
            }
            $image = $p->getImage();
            $name_image=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('image_directory'), $name_image);
            $p->setImage($name_image);
            $this->getDoctrine()->getManager()->persist($p);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_homepage');
        }

        return $this->render('@admin/Dashboard/ajouterP.html.twig',
            array('form'=>$Form->createView()));
    }
    function ajouterPerAction(Request $request)
    {
        $p = new personnel();
        $Form = $this->createForm(personnelType::class, $p);
        $Form->add('Envoyer', SubmitType::class);
        $Form->handleRequest($request);
        $nom_initial = $p->getImage();
        $em = $this->getDoctrine()->getManager();
        if ($Form->isSubmitted() && $Form->isValid()) {
            {
                $verif = $Form->get('image')->getData();
                if ($verif == null) {

                    $p->setImage($nom_initial);
                    $this->getDoctrine()->getManager()->persist($p);
                    $this->getDoctrine()->getManager()->flush();
                    return $this->redirectToRoute('admin_homepage');
                }
                $image = $p->getImage();
                $name_image = uniqid() . '.' . $image->guessExtension();
                $image->move($this->getParameter('image_directory'), $name_image);
                $p->setImage($name_image);
                $this->getDoctrine()->getManager()->persist($p);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('admin_homepage');
            }
        }
        return $this->render('@admin/Dashboard/ajouterPer.html.twig',
            array('form' => $Form->createView()));
    }


    function RechercheACtion(Request $request){

        $rech = $request->get('rech');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT e
    FROM projetBundle:eleve e
    WHERE e.nom LIKE :rech')->setParameter('rech', '%'.$rech.'%');
        $eleve = $query->getResult();

        return $this->render('@admin/Dashboard/recherche_eleve.html.twig',
            array('e'=>$eleve));

    }
    function RechercheparentACtion(Request $request){

        $rech = $request->get('rech');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT e
    FROM projetBundle:parents e
    WHERE e.nom LIKE :rech')->setParameter('rech', '%'.$rech.'%');
        $parents = $query->getResult();

        return $this->render('@admin/Dashboard/recherche_parents.html.twig',
            array('pa'=>$parents));

    }
    function RecherchepersoACtion(Request $request){

        $rech = $request->get('rech');
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT e
    FROM projetBundle:personnel e
    WHERE e.nom LIKE :rech')->setParameter('rech', '%'.$rech.'%');
        $personnel = $query->getResult();

        return $this->render('@admin/Dashboard/recherche_perso.html.twig',
            array('p'=>$personnel));

    }

    function trierelevenomAction(Request $request){
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT e
    FROM projetBundle:eleve e
    ORDER BY e.nom ASC'
        );
        $eleve = $query->getResult();
        return $this->render('@admin/Dashboard/afficher_eleves.html.twig',
            array('e'=>$eleve));
    }
    function trierelevenomdesAction(Request $request){
        $query = $this->getDoctrine()->getManager()->createQuery(
            'SELECT e
    FROM projetBundle:eleve e
    ORDER BY e.nom DESC'
        );
        $eleve = $query->getResult();
        return $this->render('@admin/Dashboard/afficher_eleves.html.twig',
            array('e'=>$eleve));
    }
}
