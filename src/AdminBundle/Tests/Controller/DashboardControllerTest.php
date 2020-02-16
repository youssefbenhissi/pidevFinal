<?php

namespace AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    public function testAfficher()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficher');
    }

    public function testSupprimercategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimerCategorie');
    }

    public function testSupprimerevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimerEvenement');
    }

    public function testModifiercategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifiercategorie');
    }

    public function testModifierevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifierEvenement');
    }

}
