<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\MenuService;
use App\Menu\MenuParts\Pizza;

class MenuServiceTest extends KernelTestCase {
    /**
     * 
     * @var MenuService
     */
    private ?MenuService $_menuService;
    
    public function testOnlyMainService(): void {
      
        // Call the service method
        $menu = $this->_menuService->onlyMain(Pizza::class);
        
        $this->assertEquals(15.50, $menu->getPrice());
    }
    
    protected function setUp(): void {
        self::bootKernel();
        
        $container = static::getContainer();
        
        $this->_menuService = $container->get(MenuService::class);
    }
}
