<?php
namespace App\Menu\Impl;

use App\Menu\MenuInterface;
use App\Menu\MenuComposer;

final class DessertDecoratorImpl implements MenuInterface, MenuComposer {

    private $decorator;
    private $piece;
    
    public function __construct(MenuInterface $decorator) {
        $this->decorator = $decorator;
    }

    public function addItem(MenuInterface $piece): void {
        $this->piece = $piece;
    }

    public function getPrice(): float {
        return $this->decorator->getPrice() + $this->piece->getPrice();
    }
}

