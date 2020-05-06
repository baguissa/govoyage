<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends BaseFixtures
{
    /**
     * Faker generator
     *
     * @var Generator
     */
    protected $faker;

    public function loadData(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->createMany(User::class, 10, function(User $user, $count){
            $user->setName($this->faker->name)
                ->setSurname($this->faker->name)
                ->setEmail($this->faker->email)
                ->setPhone($this->faker->phoneNumber)
                ->setRole($this->faker->randomElement(['DRIVER','PASSENGER','ADMIN']))
                ->setState('ACTIVED')
                ->setPassword(md5('password'));
            
        });
        $manager->flush();
    }
}
