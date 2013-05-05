<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * User.php
 *
 * @author
 * @date 2013/05/04
 * @link
 */
namespace Ensiie\UserBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Ensiie\UserBundle\Entity\User;

class Users extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('t@gmail.com');
        $user->setUserName('toto');
        $user->setPlainPassword('titi');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $user->setShip(
            $manager->getRepository("EnsiieIaatoBundle:Ship")
            ->findOneBy(array("name"=>"Titanic"))
        );
    
        $manager->persist($user);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setUserName('admin');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setShip(
            $manager->getRepository("EnsiieIaatoBundle:Ship")
            ->findOneBy(array("name"=>"Queen Mary"))
        );
        $manager->persist($user);

        

        $manager->flush();
    }
    public function getOrder()
    {
         return 6; // the order in which fixtures will be loaded
                            }
}



?>

