<?php

namespace Mgilet\NotificationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerControllerTest extends WebTestCase
{
    public function testSendnotification()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sendNotification');
    }

}
