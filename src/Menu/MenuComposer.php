<?php
namespace App\Menu;

interface MenuComposer {
    public function addItem(MenuInterface $piece): void;
}