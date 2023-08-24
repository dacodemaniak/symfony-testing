<?php
namespace App\Menu\Impl;

use App\Menu\MenuInterface;
use App\Menu\MenuComposer;

class MainCourseImpl implements MenuInterface, MenuComposer {
    private $piece;
    
    public function __construct() {}
    
    public function addItem(MenuInterface $piece): void {
        $this->piece = $piece;
    }
    
    public function getPrice(): float {
        return $this->piece->getPrice();
    }
}

