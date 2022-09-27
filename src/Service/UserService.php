<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserService
{
    private ObjectManager $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getWelcomeMessage($id): string
    {
        $userRepository = $this->objectManager
            ->getRepository(User::class);
        $user = $userRepository->find($id);

        return "Bienvenue " . $user->getFistName() . " " . $user->getLastName();
    }
}

