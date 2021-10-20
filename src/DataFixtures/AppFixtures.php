<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Faker\Factory;
use App\Entity\Categoriee;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        
            $categorie1 = new Categoriee();
            $categorie2 = new Categoriee();
            $categorie3 = new Categoriee();
            $categorie1->setDesignation("amis");
            $categorie2->setDesignation("professionnels");
            $categorie3->setDesignation("connaissances");
            
            $manager->persist($categorie3);
            $manager->persist($categorie2);
            $manager->persist($categorie1);
            $cats=[$categorie2, $categorie1, $categorie3];


            for ($i = 1; $i <= 15; $i++) {
                $contact = new Contact();
                
                $nom = $faker->lastName();
                $prenom = $faker->firstName();
                $adresse = $faker->address();
                $codePostal = $faker->numberBetween(10000, 99999);
                $adresseMail = $faker->email();
                $avatar = $faker->imageUrl(1000, 350);
                $ville = $faker->city();
                $numTel = $faker->e164PhoneNumber();


                $contact->setNom($nom)
                    ->setPrenom($prenom)
                    ->setAdresse($adresse)
                    ->setCodePostal($codePostal)
                    ->setAdresseMail($adresseMail)
                    ->setAvatar($avatar)
                    ->setCategorie($cats[mt_rand(0,2)])
                    ->setNumTel($numTel)
                    ->setVille($ville);

                $manager->persist($contact);
            }
        
        $manager->flush();
    }
}
