<?php

namespace Mgilet\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ControllerController extends Controller
{
    public function sendNotificationAction()
    {
        return $this->render('MgiletNotificationBundle:Controller:send_notification.html.twig', array(
            // ...
        ));
    }

}
