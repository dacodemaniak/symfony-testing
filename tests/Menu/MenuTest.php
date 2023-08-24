<?php

namespace App\Tests\Menu;

use PHPUnit\Framework\TestCase;
use App\Menu\Impl\MainCourseImpl;
use App\Menu\MenuParts\Pizza;
use App\Menu\Impl\StarterDecoratorImpl;
use App\Menu\MenuParts\Salade;
use App\Menu\Impl\DessertDecoratorImpl;
use App\Menu\MenuParts\Glace;

class MenuTest extends TestCase
{
    public function testSingleMainCourse(): void {
        $menu = new MainCourseImpl();
        $menu->addItem(new Pizza());
        
        $this->assertEquals(15.50, $menu->getPrice());
    }
    
    public function testStarterAndMainCourse() {
        $menu = new MainCourseImpl();
        $menu->addItem(new Pizza());
        
        $menu = new StarterDecoratorImpl($menu);
        $menu->addItem(new Salade());
        
        $this->assertEquals(21.50, $menu->getPrice());
    }
    
    public function testMainAndDessert(): void {
        $menu = new MainCourseImpl();
        $menu->addItem(new Pizza());
        
        $menu = new DessertDecoratorImpl($menu);
        $menu->addItem(new Glace());
        
        $this->assertEquals(23.00, $menu->getPrice());
        
    }
    
    public function testFullMenu(): void {
        $menu = new MainCourseImpl();
        $menu->addItem(new Pizza());
        
        $menu = new StarterDecoratorImpl($menu);
        $menu->addItem(new Salade());
        
        $menu = new DessertDecoratorImpl($menu);
        $menu->addItem(new Glace());
        
        $this->assertEquals(29.00, $menu->getPrice());
    }
}
