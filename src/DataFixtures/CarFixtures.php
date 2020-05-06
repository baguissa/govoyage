<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Car;
use App\Entity\User;
use Faker\Generator;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarFixtures extends BaseFixtures
{
    /**
     * Faker generator
     *
     * @var Generator
     */
    protected $faker;
    

    public static $data;
    public function __construct(UserRepository $repository){
        self::$data = $repository->findAll();
    }

    public function loadData(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->createMany(Car::class, 10, function(Car $car, $count){
            $user = $this->faker->randomElement(CarFixtures::$data);
            $car->setbrand($this->faker->randomElement(['Toyota','Renault','Nissan']))
                ->setModel($this->faker->randomElement(['A','B','C', 'D','H']) . '-' .
                    $this->faker->randomElement(['Yaris','Fiesta','Megan']))
                ->setImmatriculation($this->faker->numberBetween(1000,9000))
                ->setLastControl($this->faker->datetime())
                ->setUser($user);
        });
        $manager->flush();
    }
}
