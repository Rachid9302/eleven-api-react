<?php

namespace tests\AppBundle\Controller;

use AppBundle\Entity\Astronaute;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AstronauteControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testget()
    {
        $this->client->request('GET', 'astronaute/1');

        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('nom', $data);
        $this->assertArrayHasKey('prenom', $data);
        $this->assertArrayHasKey('age', $data);
    }

    public function testcget()
    {
        $this->client->request('GET', 'astronautes');

        $response = $this->client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('nom', $data[0]);
        $this->assertArrayHasKey('prenom', $data[0]);
        $this->assertArrayHasKey('age', $data[0]);
    }


    public function testPost()
    {
        $data = [
            'nom'      => "Dupont",
            'prenom' => 'Jean',
            'age'    => 25,
        ];
        $this->client->request('POST', 'new-astronaute', $data);

        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testPostWithError()
    {
        $data = [
            'nom'      => "Dupont",
            'prenom' => 'Louis',
            'age'    => "test",
        ];
        $this->client->request('POST', 'new-astronaute', $data);

        $response = $this->client->getResponse();
        $this->assertEquals(500, $response->getStatusCode());
    }
}