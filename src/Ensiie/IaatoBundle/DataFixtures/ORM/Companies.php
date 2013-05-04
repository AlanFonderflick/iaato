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
        
        $company = new Company();
        $company->setName('La Companie');
        $manager->persist($company);

        $company = new Company();
        $company->setName('BestCompany');
        $manager->persist($company);
        
        $company = new Company();
        $company->setName('MyMajorCompany');
        $manager->persist($company);


        $manager->flush();
    }
    public function getOrder()
    {
       return 1; // the order in which fixtures will be loaded
    }

}

?>

