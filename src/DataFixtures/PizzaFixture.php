<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pizza;

class PizzaFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $pizza = new Pizza();
        $pizza->setName('Quatre saisons');
        $pizza->setPrice(15.50);
        $pizza->setDiameter(33);
        $manager->persist($pizza);
        

        $pizza = new Pizza();
        $pizza->setName('Romaine');
        $pizza->setPrice(14.00);
        $pizza->setDiameter(33);
        $manager->persist($pizza);
        

        $manager->flush();
    }
}
