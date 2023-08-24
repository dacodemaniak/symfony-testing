<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\PizzaService;
use App\Entity\Pizza;

class PizzaServiceTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        $pizzaService = static::getContainer()->get(PizzaService::class);
        
        $this->assertInstanceOf(Pizza::class, $pizzaService->getById(1));
    }
}
