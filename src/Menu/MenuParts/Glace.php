<?php
namespace App\Menu\MenuParts;

use App\Menu\MenuInterface;

class Glace implements MenuInterface {
    private $price;

    public function __construct() {
        $this->price = 7.50;
    }

    public function getPrice(): float {
        return $this->price;
    }
}

