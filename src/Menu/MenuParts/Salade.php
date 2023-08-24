<?php
namespace App\Menu\MenuParts;

use App\Menu\MenuInterface;

class Salade implements MenuInterface {
    private $price;
    
    public function __construct() {
        $this->price = 6.0;
    }


    public function getPrice(): float {
        return $this->price;
    }
}

