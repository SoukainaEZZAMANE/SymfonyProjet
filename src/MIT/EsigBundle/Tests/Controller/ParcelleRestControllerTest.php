<?php

namespace MIT\EsigBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParcelleRestControllerTest extends WebTestCase
{
    public function testGetparcelles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getParcelles');
    }

}
