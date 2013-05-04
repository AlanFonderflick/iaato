<?php

namespace Ensiie\IaatoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ship
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ensiie\IaatoBundle\Entity\ShipRepository")
 */
class Ship
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     *@ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Company",inversedBy="Ship") 
     *@ORM\JoinColumn(nullable=true)
     */
    private $company;


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
     * Set name
     *
     * @param string $name
     * @return Ship
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set company
     *
     * @param \Ensiie\IaatoBundle\Entity\Company $company
     * @return Ship
     */
    public function setCompany(\Ensiie\IaatoBundle\Entity\Company $company = null)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return \Ensiie\IaatoBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
