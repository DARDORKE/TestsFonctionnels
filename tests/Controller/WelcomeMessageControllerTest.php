<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WelcomeMessageControllerTest extends WebTestCase
{
    public function testWelcomeMessageIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/welcome-message');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        echo $client->getResponse()->getContent();

    }

    public function testHomePageIsDown()
    {
        $client = static::createClient();
        $client->request('GET', '/home');

        $this->assertSame(404, $client->getResponse()->getStatusCode());
    }

    public function testMessageIsGood()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/welcome-message');

        $this->assertSelectorTextContains("div", "Bienvenue Kévy DARDOR");
    }

}