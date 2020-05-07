<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use App\Entity\Announce;
use App\Repository\CarRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnnounceFixtures extends BaseFixtures
{
    /**
     * Faker generator
     *
     * @var Generator
     */
    protected $faker;
    

    public static $data;

    public function __construct(CarRepository $repository){
        self::$data = $repository->findAll();
    }

    public function loadData(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->createMany(Announce::class, 10, function(Announce $announce, $count){
            $car = $this->faker->randomElement(AnnounceFixtures::$data);
            
            $departure = $this->faker->city;
            do{
                $arrival = $this->faker->city;
            }while($arrival == $departure);

            $departureAddress = $this->faker->address;
            do{
                $arrivalAddress = $this->faker->address;
            }while($arrivalAddress == $departureAddress);

            $departureTime = \DateTime::createFromFormat('H:i:s',$this->faker->time);
            do{
                $arrivalTime =  \DateTime::createFromFormat('H:i:s',$this->faker->time);
            }while($arrivalTime <= $departureTime);

            $departureDate = $this->faker->dateTime->format('Y-m-d');
            $departureDate = \DateTime::createFromFormat('Y-m-d', $departureDate);

            $announce->setDeparture($departure)
                ->setDepartureAddress($departureAddress)
                ->setArrival($arrival)
                ->setArrivalAddress($arrivalAddress)
                ->setDepartureDate($departureDate)
                ->setDepartureTime($departureTime)
                ->setArrivalTime($departureTime)
                ->setPlace($this->faker->numberBetween(1,3))
                ->setCar($car);
        });
        $manager->flush();
    }
}
