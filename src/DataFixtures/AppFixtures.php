<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Volume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager, EntityManagerInterface $em): void
    {
        $volumes = [0.33, 0.5, 0.75, 1, 1.5, 2, 3];
        foreach ($volumes as $volume) {
            $v = new Volume();
            $v->setVolume($volume);
            $manager->persist($v);
        }

        $user = new User();
        $user->setUsername("Cristaline");
        $user->setEmail("cristaline@water.fr");
        $password = $this->hasher->hashPassword($user, 'Cristaline1');
        $user->setPassword($password);
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername("Evian");
        $user1->setEmail("evian@water.fr");
        $user1->setRoles(["ROLE_USER"]);
        $password = $this->hasher->hashPassword($user1, 'Evian1');
        $user1->setPassword($password);
        $manager->persist($user1);

        $volume = $em->getRepository(Volume::class)->findAll();
        $produit = new Produit();
        $produit->setImageUrl('https://www.justeatemps.com/statique/images/front//img/Products/large/4041.jpg');
        $produit->setDescription('Bouteille à emporter partout');
        $produit->setNomProduit('Bouteille de 50cl');
        $produit->setTypeVolume($volume[1]);
        $manager->persist($produit);

        $volume = $em->getRepository(Volume::class)->findAll();
        $produit1 = new Produit();
        $produit1->setImageUrl('https://www.cora.fr/media/produit/1700802042/600/R10/iZzbILezwrhxwrwrwrJwwrwriZOqQB.jpg');
        $produit1->setDescription('Bouteille typique du pack de 6');
        $produit1->setNomProduit('Bouteille classique');
        $produit1->setTypeVolume($volume[4]);
        $manager->persist($produit1);

        $volume = $em->getRepository(Volume::class)->findAll();
        $produit3 = new Produit();
        $produit3->setImageUrl('https://www.evian.com/fileadmin/user_upload/fr/33CL-V2.png');
        $produit3->setDescription('Bouteille qui tien dans la poche');
        $produit3->setNomProduit('Bouteille 33cl');
        $produit3->setTypeVolume($volume[0]);
        $manager->persist($produit3);

        $volume = $em->getRepository(Volume::class)->findAll();
        $produit4 = new Produit();
        $produit4->setImageUrl('https://www.yoshi-sushi.fr/411-tm_thickbox_default/ev-evian-1litre.jpg');
        $produit4->setDescription("Bouteille pour la ration quotidienne d'eau");
        $produit4->setNomProduit('Bouteille 1L');
        $produit4->setTypeVolume($volume[1]);
        $manager->persist($produit4);
    }
}