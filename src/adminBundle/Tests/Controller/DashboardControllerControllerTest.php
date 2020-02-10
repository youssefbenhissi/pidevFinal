<?php

namespace adminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerControllerTest extends WebTestCase
{
    public function testAfficherctegorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherCtegorie');
    }

}
