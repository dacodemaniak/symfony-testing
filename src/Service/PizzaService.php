<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PizzaRepository;
use App\Entity\Pizza;

final class PizzaService {
    private EntityManagerInterface $_em;
    private PizzaRepository $_repository;
    
    public function __construct (
            EntityManagerInterface $em
        ) {
        $this->_em = $em;
        $this->_repository = $em->getRepository(Pizza::class);
    }
    
    public function getById(int $id): Pizza {
        return $this->_repository->find($id);
    }
}

