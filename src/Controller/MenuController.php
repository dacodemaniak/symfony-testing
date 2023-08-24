<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MenuService;
use App\Menu\MenuParts\Pizza;

class MenuController extends AbstractController
{
    #[Route('/menu/maincourse', name: 'app_menu')]
    public function maincourse(MenuService $service): JsonResponse {
        $menu = $service->onlyMain(Pizza::class);
        
        return $this->json([
            'status' => '200',
            'total' => $menu->getPrice()
        ]);
    }
}
