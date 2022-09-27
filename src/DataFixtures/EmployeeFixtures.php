<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $employee = new Employee();
            $employee->setLastName("$i");
            $employee->setFirstName("Employee");
            $employee->setAge($i + 30);
            $employee->setSalary($i + 1245.4);
            $employee->setPrime($employee->getSalary() / 100 * 10);
            $manager->persist($employee);
        }

        $manager->flush();
    }
}
