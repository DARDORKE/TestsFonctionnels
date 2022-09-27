<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\UserService;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;
use App\Repository\UserRepository;

class UserServiceTest extends TestCase
{
    public function testGetWelcomeMessage()
    {
        $user = new User();
        $user->setFistName("Chris");
        $user->setLastName("Chevalier");

        $userMock = $this->createMock(UserRepository::class);
        $userMock->expects($this->once())
            ->method('find')
            ->willReturn($user);

        $objectManager = $this->createMock(ObjectManager::class);

        $objectManager->expects($this->once())
            ->method('getRepository')
            ->willReturn($userMock);

        $userService = new UserService($objectManager);
        $this->assertEquals("Bienvenue Chris Chevalier", $userService->getWelcomeMessage(1));
    }
}
