<?php

namespace App\DataFixtures;

use App\Entity\Logement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $this->addLogements($manager, $faker);

    }

    public function addLogements(ObjectManager $manager, Generator $generator){


        for ($i = 0; $i < 300; $i++) {

            $logement = new Logement();

            $logement
                ->setSurface($generator->numberBetween(25, 250))
                ->setNumberOfRoom($generator->numberBetween(1, 10))
                ->setType($generator->randomElement(['Maison', 'Appartement', 'Yourte']))
                ->setAdress($generator->address)
                ->setIsExterior($generator->boolean(50));
            if ($logement->isIsExterior()) {
                $logement->setExteriorSurface($generator->numberBetween(300, 2500));
            }
            if ($logement->getType() == 'Maison') {
                $logement->setIsGarage(true);
                $logement->setIsSwimmingPool(true);
            } else {
                $logement->setIsGarage(false);
                $logement->setIsSwimmingPool(false);
            }
            $logement
                ->setModality($generator->randomElement(['Vente', 'Location']));
            if ($logement->getModality() == 'Vente') {
                $logement->setPrice($generator->numberBetween(100000, 500000));
            } else {
                $logement->setPrice($generator->numberBetween(300, 2000));
            }
            $logement
                ->setReleaseDate($generator->dateTimeBetween("-6 month"))
                ->setPicture($logement->getType() . $generator->numberBetween(1, 3) . '.png');

            $manager->persist($logement);

        }


        $manager->flush();
    }

}
