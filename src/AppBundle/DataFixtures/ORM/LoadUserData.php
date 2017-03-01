<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    public static $users = [];

    public static $newUserPrototype = [
        'email' => 'admin@admin.com',
        'username' => 'admin',
        'password' => 'admin',
        'roles' => [
            'ROLE_ADMIN',
        ],
    ];

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        self::$users = [];

        $userManager = $this->container->get('fos_user.user_manager');

        $newUser = $userManager->createUser();
        $newUser
            ->setEmail(self::$newUserPrototype['email'])
            ->setUsername(self::$newUserPrototype['username'])
            ->setPlainPassword(self::$newUserPrototype['password'])
            ->setRoles(self::$newUserPrototype['roles'])
            ->setEnabled(true);

        $userManager->updateUser($newUser);

        self::$users[] = $newUser;

        $manager->clear();
    }

    public function getOrder()
    {
        return 1.0;
    }
}
