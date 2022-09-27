<?php

namespace App\Service;

use App\Entity\Employee;
use Doctrine\Persistence\ObjectManager;

class SalaryCalculator
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function calculateTotalSalary($id): ?float
    {
        $employeeRepository = $this->objectManager
            ->getRepository(Employee::class);
        $employee = $employeeRepository->find($id);

        return $employee->getSalary() + $employee->getPrime();
    }
}
