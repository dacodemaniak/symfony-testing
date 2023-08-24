<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PizzaService;

class PizzaController extends AbstractController
{
    private PizzaService $_service;
    
    public function __construct(PizzaService $service) {
        parent::__construct();
        $this->_service = $service;
    }
    
    #[Route('/pizza/{id}', name: 'one_pizza',requirements:['id' => '\d+'])]
    public function getOne(int $id): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PizzaController.php',
        ]);
    }
}
