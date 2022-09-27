<?php

namespace App\Tests\Service;

use App\Entity\Employee;
use App\Service\SalaryCalculator;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;
use App\Repository\EmployeeRepository;

class SalaryCalculatorTest extends TestCase
{
    public function testCalculateTotalSalary()
    {
        $employee = new Employee();
        $employee->setSalary(1800);
        $employee->setPrime(200);

        $employeeRepository = $this->createMock(EmployeeRepository::class);
        $employeeRepository->expects($this->once())
            ->method('find')
            ->willReturn($employee);

        $objectManager = $this->createMock(ObjectManager::class);
        $objectManager->expects($this->once())
            ->method('getRepository')
            ->willReturn($employeeRepository);

        $salaryCalculator = new SalaryCalculator($objectManager);
        $this->assertEquals(2000, $salaryCalculator->calculateTotalSalary(1));
    }
}

