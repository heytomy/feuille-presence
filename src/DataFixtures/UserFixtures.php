<?php

namespace App\DataFixtures;

use App\Entity\Student;
use App\Entity\Teacher;
use Faker\Factory as Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

        $user = new Teacher();
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
        $hashedPassword = $this->passwordHasher->hashPassword(new Student(), 'password');

        for ($i=0; $i < 100; $i++) { 
            $lastname = $faker->lastName();
            $firstname = $faker->firstName();   
            $phone = $faker->phoneNumber(); 
            $createdAt = $this->createdAt = new \DateTimeImmutable();
            $updatedAt = $this->updatedAt = new \DateTimeImmutable();
            $user = new Student();
            $user
                ->setEmail($faker->email())
                ->setFirstName($firstname)
                ->setLastName($lastname)
                ->setPhone($phone)
                ->setCreatedAt($createdAt)
                ->setUpdatedAt($updatedAt)
                ->setRoles(['ROLE_ELEVE']) 
            ;
            $user->setPassword($hashedPassword);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
