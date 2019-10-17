<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User; 

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        // USER
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['USER']);
        $user->setPassword('user');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'user'));
        $manager->persist($user);

        // ADMIN
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ADMIN']);
        $user->setPassword('admin');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'admin'));
        $manager->persist($user);

        // SUPERADMIN
        $user = new User();
        $user->setEmail('superadmin@gmail.com');
        $user->setRoles(['SUPERADMIN']);
        $user->setPassword('superadmin');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'superadmin'));
        $manager->persist($user);

        $manager->flush();
    }
}
