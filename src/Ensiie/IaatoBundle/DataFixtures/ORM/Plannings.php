<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * Plannings.php
 *
 * @author
 * @date 2013/05/04
 * @link
 */

namespace Ensiie\IaatoBundle\DataFixtures\ORM;
use Ensiie\IaatoBundle\Entity\Planning;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class Plannings extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $planning = new Planning();
        $planning->setDay(new \Datetime("now"));
        $planning->setShip(
            $manager->getRepository("EnsiieIaatoBundle:Ship")
                    ->findOneBy(array("name"=>"Titanic"))
                );
        $planning->setSite1(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile deserte"))
        );
        $planning->setSite2(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux pingouins"))
        );
        $planning->setSite3(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux ours"))
        );
        $planning->setSite4(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile deserte"))
        );
        $planning->setDuration1(new \Datetime('1:05:02'));
        $planning->setDuration2(new \Datetime('5:05:02'));
        $planning->setDuration3(new \Datetime('7:05:02'));
        $planning->setDuration4(new \Datetime('0:05:02'));

        $manager->persist($planning);
//////////////////////////////////////////
        $planning = new Planning();
        $planning->setDay(new \Datetime("yesterday"));
        $planning->setShip(
            $manager->getRepository("EnsiieIaatoBundle:Ship")
                    ->findOneBy(array("name"=>"Queen Mary"))
                );
        $planning->setSite1(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux ours"))
        );
        $planning->setSite2(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux pingouins"))
        );
        $planning->setSite3(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux ours"))
        );
        $planning->setSite4(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile deserte"))
        );
        $planning->setDuration1(new \Datetime('1:08:02'));
        $planning->setDuration2(new \Datetime('6:05:02'));
        $planning->setDuration3(new \Datetime('17:05:02'));
        $planning->setDuration4(new \Datetime('0:05:02'));
        $manager->persist($planning);
        
//////////////////////////////////////////
        $planning = new Planning();
        $planning->setDay(new \Datetime("tomorrow"));
        $planning->setShip(
            $manager->getRepository("EnsiieIaatoBundle:Ship")
                    ->findOneBy(array("name"=>"Queen Mary 2"))
                );
        $planning->setSite1(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux ours"))
        );
        $planning->setSite2(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile deserte"))
        );
        $planning->setSite3(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux ours"))
        );
        $planning->setSite4(
            $manager->getRepository("EnsiieIaatoBundle:Site")
            ->findOneBy(array("name"=>"L'ile aux pingouins"))
        );
        $planning->setDuration1(new \Datetime('10:08:02'));
        $planning->setDuration2(new \Datetime('16:05:02'));
        $planning->setDuration3(new \Datetime('07:05:02'));
        $planning->setDuration4(new \Datetime('08:05:02'));
        $manager->persist($planning);
        


        $manager->flush();
    }
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}



?>


?>

