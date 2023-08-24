<?php
namespace App\Menu\MenuParts;

use App\Menu\MenuInterface;

class Pizza implements MenuInterface
{
    private $price;
    
    public function __construct() {
        $this->price = 15.50;
    }


    public function getPrice(): float {
        return $this->price;
    }
}

