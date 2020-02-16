<?php

namespace EvenementBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EvenementControllerTest extends WebTestCase
{
    public function testAfficher()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficher');
    }

    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter');
    }

    public function testRechercher()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechercher');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifier');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimer');
    }

    public function testAffichercategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherCategorie');
    }

    public function testAjouterreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterReservation');
    }

}
