<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeMessageController extends AbstractController
{
    /**
     * @Route("/welcome-message")
     */
    public function welcome(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $firstName = "Kévy";
        $lastName = "DARDOR";

        if ($form->isSubmitted() && $form->isValid()) {
            $firstName = $user->getFirstname();
            $lastName = $user->getLastname();
        }

        return $this->render('welcomeMessage.html.twig', [
            'form' => $form->createView(),
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);
    }
}

?>