<?php

namespace App\Tests\Controller;

use Symfony\Component\Panther\PantherTestCase;

class WelcomeMessagePantherTest extends PantherTestCase
{
    public function testWelcomeMessage()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/welcome-message');
        $form = $crawler->selectButton("Valider")->form([
            "user[firstname]" => "Pauline",
            "user[lastname]" => "Dumont",
        ]);
        $client->submit($form);
        $this->assertSelectorTextContains("h2", "Bienvenue Pauline Dumont");
    }
}

