<?php
// vim: set et sw=4 ts=4 sts=4 fdm=marker ff=unix fenc=utf8
/**
 * Company.php
 *
 * @author
 * @date 2013/05/04
 * @link
 */

namespace Ensiie\IaatoBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ensiie\IaatoBundle\Entity\Company;

class Companies implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $noms = array('La Companie', 'BestCompany', 'FavoriteCompany', 'L\'Armateur');
        foreach($noms as $i => $nom)
        {
            $liste[$i] = new Company();
            $liste[$i]->setName($nom);
            $manager->persist($liste[$i]);
        }
        $manager->flush();
    }
}

?>

