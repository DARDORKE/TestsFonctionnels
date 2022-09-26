<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeMessageController extends AbstractController
{
    #[Route('/welcome-message', name: 'app_welcome_message')]
    public function sayWelcome(): Response
    {
        return $this->render('welcome_message/index.html.twig', [
            'firstName' => 'Kévy',
            'lastName' => 'DARDOR',
        ]);
    }
}
