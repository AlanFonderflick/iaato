<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * Ships.php
 *
 * @author
 * @date 2013/05/04
 * @link
 */

namespace Ensiie\IaatoBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ensiie\IaatoBundle\Entity\Ship;

class Ships implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $ship = new Ship();
        $ship->setName('Titanic');
        $ship->setCompany(
            $manager->getRepository("EnsiieIaatoBundle:Company")->findOneBy(array("name"=>"La Companie"))
        );
        $manager->persist($ship);
        
        $ship = new Ship();
        $ship->setName('Queen Mary');
        $ship->setCompany(
            $manager->getRepository("EnsiieIaatoBundle:Company")->findOneBy(array("name"=>"BestCompany"))
        );
        $manager->persist($ship);
        
        $ship = new Ship();
        $ship->setName('Queen Mary 2');
        $ship->setCompany(
            $manager->getRepository("EnsiieIaatoBundle:Company")->findOneBy(array("name"=>"BestCompany"))
        );
        $manager->persist($ship);



        $manager->flush();
    }
}



?>

