<?php

namespace projetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class personnelControllerTest extends WebTestCase
{
    public function testAfficherpersonnel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherPersonnel');
    }

}
