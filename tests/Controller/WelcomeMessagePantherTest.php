<?php

namespace App\Tests\Controller;

use Symfony\Component\Panther\PantherTestCase;

class WelcomeMessagePantherTest extends PantherTestCase
{
    public function testWelcomeMessage()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/welcome-message');


    }
}