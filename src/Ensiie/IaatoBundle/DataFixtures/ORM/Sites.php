<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * Site.php
 *
 * @author
 * @date 2013/05/04
 * @link
 */


namespace Ensiie\IaatoBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ensiie\IaatoBundle\Entity\Site;

class Sites implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $site = new Site();
        $site->setName("L'ile aux pingouins");
        $site->setLatitude(115);
        $site->setLongitude(3);
        $manager->persist($site);
        
        $site = new Site();
        $site->setName("L'ile aux ours");
        $site->setLatitude(15);
        $site->setLongitude(100);
        $manager->persist($site);
        
        $site = new Site();
        $site->setName("L'ile deserte");
        $site->setLatitude(115);
        $site->setLongitude(3);
        $manager->persist($site);

        $manager->flush();
    }
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
    
}


?>

