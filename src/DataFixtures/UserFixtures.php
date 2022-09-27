<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setLastName("Doe$i");
            $user->setFistName("John$i");
            $manager->persist($user);
        }

        $manager->flush();
    }
}
