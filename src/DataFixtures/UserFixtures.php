<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Faker\Factory as Faker;

class UserFixtures extends Fixture
{
    /**
     * Permet d'encoder un mot de passe
     *
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;    
    }


    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');
        
        $lastname = $faker->lastName();
        $firstname = $faker->firstName();
        $phone = $faker->phoneNumber();
        $createdAt = $this->createdAt = new \DateTimeImmutable();
        $updatedAt = $this->updatedAt = new \DateTimeImmutable();

        $user = new User();
        $user
            ->setEmail('admin@email.com')
            ->setFirstName($firstname)
            ->setLastName($lastname)
            ->setPhone($phone)
            ->setRoles(['ROLE_FORMATEUR']) 
            ->setCreatedAt($createdAt)
            ->setUpdatedAt($updatedAt)
        ;
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'admin');
        $user->setPassword($hashedPassword);
        
        $manager->persist($user);

        for ($i=0; $i < 100; $i++) { 
            $lastname = $faker->lastName();
            $firstname = $faker->firstName();   
            $phone = $faker->phoneNumber(); 
            $createdAt = $this->createdAt = new \DateTimeImmutable();
            $updatedAt = $this->updatedAt = new \DateTimeImmutable();
            $user = new User();
            $user
                ->setEmail($faker->email())
                ->setFirstName($firstname)
                ->setLastName($lastname)
                ->setPhone($phone)
                ->setCreatedAt($createdAt)
                ->setUpdatedAt($updatedAt)
                ->setRoles(['ROLE_ELEVE']) 
            ;
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'password');
            $user->setPassword($hashedPassword);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
