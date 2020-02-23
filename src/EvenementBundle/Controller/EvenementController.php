<?php

namespace EvenementBundle\Controller;
use Endroid\QrCode\QrCode;
use EvenementBundle\Entity\categorieEvenement;
use EvenementBundle\Entity\Evenement;
use EvenementBundle\Entity\Reservation;
use EvenementBundle\Form\EvenementType;
use EvenementBundle\Form\ReservationForm;
use EvenementBundle\Form\ReservationType;
use Swift_Attachment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use EvenementBundle\Repository\EvenementRepository;

class EvenementController extends Controller
{
    public function mesReservationsDonneesAction(Request $request)
    {
        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $search = $request->get('search');

        $user = $this->getUser();
        $filters = [
            'query' => @$search['value'],
            'user' => @$user,
        ];
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("EvenementBundle:Evenement")->searchReservation(
            $filters, $start, $length
        );


        $output = array(
            'data' => array(),
            'recordsFiltered' => count($this->getDoctrine()->getRepository('EvenementBundle:Evenement')->searchReservation($filters, 0, false)),
            'recordsTotal' => count($this->getDoctrine()->getRepository('EvenementBundle:Evenement')->searchReservation(array(), 0, false))
        );
        foreach ($evenements as $event) {
            $reservations = $event->getReservations();
            foreach ($reservations as $reservation) {
                if ($reservation->getIdUser() == $user && $reservation->getStatut() == "Confirmé") {

                    $output['data'][] = [
                        'nomE' => $event->getNomE(),
                        'capaciteE' => $event->getCapaciteE(),
                        'prixE' => $event->getPrixE(),
                        'dateD' => $event->getDateD()->format('Y-m-d H:i'),
                        'imgE' => '<img class="resize" src="../assets/images/' . $event->getImgE() . '"/>',
                        'Action' => "<a href=" . $this->generateUrl('annuler_reservation', ['id' => $reservation->getId(), 'id-event' => $event->getId()]) . ">annuler</a>"
                    ];

                }
                else if ($reservation->getIdUser() == $user && $reservation->getStatut() == "Annulé") {

                    $output['data'][] = [
                        'nomE' => $event->getNomE(),
                        'capaciteE' => $event->getCapaciteE(),
                        'prixE' => $event->getPrixE(),
                        'dateD' => $event->getDateD()->format('Y-m-d H:i'),
                        'imgE' => '<img class="resize" src="../assets/images/' . $event->getImgE() . '"/>',
                        'Action' => "<b> cette reservation est annulé </b>"
                    ];
                }


            }
        }
        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }

    public function mesReservationsAction()
    {

        return $this->render('@Evenement/Evenement/mesReservationsView.html.twig', []);


    }



    public function envoyerTicketAction(Request $request)
    {
        $user = $this->getUser();
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository('EvenementBundle:Evenement')->find($id);
        //$usermail = $em->getRepository('EvenementBundle:User')->getMailUser($user->getId());
        $qrCode = new QrCode('Bonjour Monsieur : ' . $user . ' , ceci votre ticket vous avez participé à l\'événement : ' . $evenement->getNomE() .
            ' , Date debut : ' . $evenement->getDateD()->format('Y-m-d'));
        header('Content-Type: image/png');
        $qrCode->writeFile('Evenement/image/qrcode/qrcode.png');
        //send tiquet at mail
        $message = (new \Swift_Message())->setSubject('Bonjour Monsieur ' . $user)
            ->setFrom('youssef.benhissi@esprit.tn')
            ->setTo('youssef.benhissi@esprit.tn')
            ->setBody('votre ticket ')
            ->attach(Swift_Attachment::fromPath('Evenement/image/qrcode/qrcode.png')
                ->setDisposition('inline'));
        $this->get('mailer')->send($message);
        return $this->redirectToRoute('accueilEvenementRouting');
    }




    public function afficherCategorieAction(Request $request)
    {
        $query = $this->getDoctrine()->getManager()->createQuery('SELECT h FROM EvenementBundle:categorieEvenement h');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2
        );
        return $this->render('@Evenement/Evenement/affichercategorie.html.twig',
            array('pagination' => $pagination
            ));
    }

    public function accueilEvenementAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository("EvenementBundle:Evenement")->findAll();
        $categorie=$this->getDoctrine()->getRepository(categorieEvenement::class)->find($id);
        return $this->render('@Evenement/Evenement/accueilEvenementView.html.twig',['evenements' => $evenements,'categorie'=>$categorie ]);
    }

    public function detailsEvenementAction(Request $request)
    {
        $user = $this->getUser();
        $id = $request->get('id');
        $reservation = new Reservation();
        $formRes = $this->createForm(ReservationForm::class, $reservation);
        $formRes->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('EvenementBundle:Evenement')->find($id);

        $check = count($em->getRepository('EvenementBundle:Reservation')->findBy(['Evenement' => $evenements,
            'idUser' => $user, 'statut' => 'Confirmé']));


        if ($formRes->isValid()) {

            $reservation->setIdUser($user);
            $reservation->setEvenement($evenements);
            $reservation->setStatut("Confirmé");
            $evenements->addReservation($reservation);
            $evenements->setCapaciteE($evenements->getCapaciteE() - 1);
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute('afficher_mes_reservations');
        }


        return $this->render('@Evenement/Evenement/detailsEvenementView.html.twig',
            ['evenements' => $evenements,'formRes'=>$formRes->createView(), 'check'=>$check]);
    }

    /*
        public function ajouterReservationAction(Request $request, $id)
        {

            $inscription = new Reservation();
            $Evenement = $this->getDoctrine()->getRepository(Evenement::class)->find($id);
            $nb = $Evenement->getCapaciteE();

            $Evenement->setCapaciteE($nb - 1);
            $inscription->setEvenement($Evenement);
            $inscription->setStatut("non validée");
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$inscription->setUser($user);
            $this->getDoctrine()->getManager()->persist($Evenement);
            $this->getDoctrine()->getManager()->persist($inscription);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('affichercategorie');
        }
    */
    public function annulerReservationAction(Request $request)
    {
        $user = $this->getUser();
        $id = $request->get('id');
        $idevenet = $request->get('id-event');
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository('EvenementBundle:Reservation')->find($id);
        $evenements = $em->getRepository('EvenementBundle:Evenement')->find($idevenet);
        if ($user !== null && $reservation->getIdUser() == $user) {
            $evenements->setCapaciteE($evenements->getCapaciteE() + 1);
            $reservation->setStatut("Annulé");
            $em->persist($reservation);
            $em->flush();

        }

        return $this->render('@Evenement/Evenement/mesReservationsView.html.twig');
    }
}
/*
    public function reconfirmerReservationAction(Request $request)
    {
        $user = $this->getUser();
        $id = $request->get('id');
        $idevenet = $request->get('id-event');
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository('EvenementBundle:Reservation')->find($id);
        $evenements = $em->getRepository('EvenementBundle:Evenement')->find($idevenet);
        if ($user !== null && $reservation->getIdUser() == $user) {
            $evenements->setCapaciteE($evenements->getCapaciteE() - 1);
            $reservation->setStatut("Confirmé");
            $em->persist($reservation);
            $em->flush();
            $this->addFlash(
                'success_res',
                'Reconfirmation avec succès!'
            );
        }

        return $this->render('@Evenement/Evenement/mesReservationsView.html.twig');
    }
}
*/