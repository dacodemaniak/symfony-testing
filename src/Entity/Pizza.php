<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Menu\MenuInterface;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza implements MenuInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column]
    private ?float $price = null;
    
    #[ORM\Column]
    private ?int $diameter = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;


    public function getId(): ?int {
        return $this->id;
    }
    
    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(int $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getPrice(): ?float
    {
        return $this->price;
    }
    
    public function setPrice(float $price): self
    {
        $this->price = $price;
        
        return $this;
    }
}
