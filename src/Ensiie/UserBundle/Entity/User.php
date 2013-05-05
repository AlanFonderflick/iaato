<?php
namespace Ensiie\UserBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="iaato_user")
*/
class User extends BaseUser
{
/**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*/
    protected $id;
    
    /**
    * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Ship")
    *@ORM\JoinColumn(nullable=true)
    */
    private $ship;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ship
     *
     * @param \Ensiie\IaatoBundle\Entity\Ship $ship
     * @return User
     */
    public function setShip(\Ensiie\IaatoBundle\Entity\Ship $ship = null)
    {
        $this->ship = $ship;
    
        return $this;
    }

    /**
     * Get ship
     *
     * @return \Ensiie\IaatoBundle\Entity\Ship 
     */
    public function getShip()
    {
        return $this->ship;
    }
}