<?php

namespace MIT\EsigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParcelleControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/parcelles');
    }

    public function testAddparcelle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/parcelle/add');
    }

    public function testDeleteparcelle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/parcelle/delete/{id}');
    }

    public function testEditparcelle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/parcelle/edit/{id}');
    }


}
