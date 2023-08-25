<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\PizzaService;
use App\Entity\Pizza;
use DMA\DoctrineTestBundle\Doctrine\DBAL\StaticDriver;

class PizzaServiceTest extends KernelTestCase {
    
    private ?PizzaService $_service;
    private $_connection;
    
    public function testSomething(): void {
        $this->assertInstanceOf(Pizza::class, $this->_service->getById(1));
    }
    
    public function testNewPizza(): void {
        $pizza = new Pizza();
        $pizza->setDiameter(33);
        $pizza->setName('Diavola');
        $pizza->setPrice(15.50);
        
        $this->_beginTransaction();
        $pizza = $this->_service->add($pizza);
        
        $this->assertEquals(3, $pizza->getId());
        
        $this->_rollbackTransaction();
    }
    
    protected function setUp(): void {
        $kernel = self::bootKernel();
        $this->_service = static::getContainer()->get(PizzaService::class);
        $this->_connection = $kernel->getContainer()->get('doctrine.dbal.default_connection');
        // $routerService = static::getContainer()->get('router');
        
    }
    
    private function _beginTransaction(): void {
        $this->_connection->beginTransaction();
    }
    
    private function _rollbackTransaction(): void {
        $this->_connection->rollBack();
    }
}
