<?php

namespace Ensiie\IaatoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PlanningRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlanningRepository extends EntityRepository
{
    public function trieDate()
    {
        return $this->createQueryBuilder('p')
                    ->add('orderBy','p.day DESC')
                    ->getQuery()
                    ->getResult();
    }
    public function trieShip()
    {
        return $this->createQueryBuilder('p')
                    ->add('orderBy','p.ship.name DESC')
                    ->getQuery()
                    ->getResult();
    }
    public function trieCompany()
    {
        return $this->createQueryBuilder('p')
                    ->add('orderBy','p.company.name DESC')
                    ->getQuery()
                    ->getResult();
    }
}
