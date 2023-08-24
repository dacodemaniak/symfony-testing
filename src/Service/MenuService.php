<?php
namespace App\Service;

use App\Menu\MenuInterface;
use App\Menu\Impl\MainCourseImpl;
use App\Menu\Impl\StarterDecoratorImpl;
use App\Menu\Impl\DessertDecoratorImpl;

final class MenuService {
    /**
     * 
     * @var MenuInterface
     */
    private $_menu;
    

    
    /**
     * Build a single main course menu
     * 
     * @param string $mainCourse
     * @return MenuInterface
     */
    public function onlyMain(string $mainCourse): MenuInterface {
        $this->_mainCourse($mainCourse);
        
        return $this->_menu;
    }
    
    /**
     * Build a starter and main course menu
     * 
     * @param string $mainCourse
     * @param string $starter
     * @return MenuInterface
     */
    public function mainAndStarter(string $mainCourse, string $starter): MenuInterface {
        $this->_mainCourse($mainCourse);
        
        // Decorate main with starter
        $this->_menu = new StarterDecoratorImpl($this->_menu);
        $this->_menu->addItem(new $starter());
        
        return $this->_menu;
    }
    
    /**
     * Build main course and dessert menu
     * 
     * @param string $mainCourse
     * @param string $dessert
     * @return MenuInterface
     */
    public function mainAndDessert(string $mainCourse, string $dessert): MenuInterface {
        $this->_mainCourse($mainCourse);
        
        // Decorate main with starter
        $this->_menu = new DessertDecoratorImpl($this->_menu);
        $this->_menu->addItem(new $dessert());
        
        return $this->_menu;
    }
    
    /**
     * Build a full menu
     * 
     * @param string $mainCourse
     * @param string $starter
     * @param string $dessert
     * @return MenuInterface
     */
    public function fullMenu(string $mainCourse, string $starter, string $dessert): MenuInterface {
        $this->_mainCourse($mainCourse);
        
        // Decorate main with starter
        $this->_menu = new StarterDecoratorImpl($this->_menu);
        $this->_menu->addItem(new $starter());
        
        $this->_menu = new DessertDecoratorImpl($this->_menu);
        $this->_menu->addItem(new $dessert());
        
        return $this->_menu;
    }
    
    private function _mainCourse(string $mainCourse): void {
        $this->_menu = new MainCourseImpl();
        $this->_menu->addItem(new $mainCourse());
    }
}

