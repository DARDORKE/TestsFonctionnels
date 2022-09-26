<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WelcomeMessageControllerTest extends WebTestCase
{
    public function testWelcomeMessage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/welcome-message');
        $form = $crawler->selectButton("Valider")->form([
            "user[firstname]" => "Pauline",
            "user[lastname]" => "Dumont",
        ]);
        $client->submit($form);
        $this->assertSelectorTextContains("h2", "Bienvenue Pauline Dumont");
    }
}

?>