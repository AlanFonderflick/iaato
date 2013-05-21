<?php

namespace Ensiie\IaatoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ensiie\IaatoBundle\Entity\PlanningRepository")
 */
class Planning
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
     * @var \DateTime
     *
     * @ORM\Column(name="day", type="datetime")
     */
    private $day;

     /**
     * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Ship")
     *@ORM\JoinColumn(nullable=true)
     */
    private $ship;

     /**
     * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Site")
     *@ORM\JoinColumn(nullable=true)
     */
    private $site_1;
     /**
     * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Site")
     *@ORM\JoinColumn(nullable=true)
     */
    private $site_2;
     /**
     * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Site")
     *@ORM\JoinColumn(nullable=true)
     */
    private $site_3;

     /**
     * @ORM\ManyToOne(targetEntity="Ensiie\IaatoBundle\Entity\Site")
     *@ORM\JoinColumn(nullable=true)
     */
    private $site_4;
    
    /**
     * @var time
     * @ORM\Column(name="duration_1",type="time")
    */
    private $duration_1;

    /**
     * @var time
     * @ORM\Column(name="duration_2",type="time")
    */
    private $duration_2;
    
    /**
     * @var time
     * @ORM\Column(name="duration_3",type="time")
    */
    private $duration_3;
    
    /**
     * @var time
     * @ORM\Column(name="duration_4",type="time")
    */
    private $duration_4;
    
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
     * Set day
     *
     * @param \DateTime $day
     * @return Planning
     */
    public function setDay($day)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return \DateTime 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set ship
     *
     * @param string $ship
     * @return Planning
     */
    public function setShip($ship)
    {
        $this->ship = $ship;
    
        return $this;
    }

    /**
     * Get ship
     *
     * @return string 
     */
    public function getShip()
    {
        return $this->ship;
    }

    /**
     * Set duration_1
     *
     * @param \DateTime $duration1
     * @return Planning
     */
    public function setDuration1($duration1)
    {
        $this->duration_1 = $duration1;
    
        return $this;
    }

    /**
     * Get duration_1
     *
     * @return \DateTime 
     */
    public function getDuration1()
    {
        return $this->duration_1;
    }

    /**
     * Set duration_2
     *
     * @param \DateTime $duration2
     * @return Planning
     */
    public function setDuration2($duration2)
    {
        $this->duration_2 = $duration2;
    
        return $this;
    }

    /**
     * Get duration_2
     *
     * @return \DateTime 
     */
    public function getDuration2()
    {
        return $this->duration_2;
    }

    /**
     * Set duration_3
     *
     * @param \DateTime $duration3
     * @return Planning
     */
    public function setDuration3($duration3)
    {
        $this->duration_3 = $duration3;
    
        return $this;
    }

    /**
     * Get duration_3
     *
     * @return \DateTime 
     */
    public function getDuration3()
    {
        return $this->duration_3;
    }

    /**
     * Set duration_4
     *
     * @param \DateTime $duration4
     * @return Planning
     */
    public function setDuration4($duration4)
    {
        $this->duration_4 = $duration4;
    
        return $this;
    }

    /**
     * Get duration_4
     *
     * @return \DateTime 
     */
    public function getDuration4()
    {
        return $this->duration_4;
    }

    /**
     * Set site_1
     *
     * @param \Ensiie\IaatoBundle\Entity\Site $site1
     * @return Planning
     */
    public function setSite1(\Ensiie\IaatoBundle\Entity\Site $site1 = null)
    {
        $this->site_1 = $site1;
    
        return $this;
    }

    /**
     * Get site_1
     *
     * @return \Ensiie\IaatoBundle\Entity\Site 
     */
    public function getSite1()
    {
        return $this->site_1;
    }

    /**
     * Set site_2
     *
     * @param \Ensiie\IaatoBundle\Entity\Site $site2
     * @return Planning
     */
    public function setSite2(\Ensiie\IaatoBundle\Entity\Site $site2 = null)
    {
        $this->site_2 = $site2;
    
        return $this;
    }

    /**
     * Get site_2
     *
     * @return \Ensiie\IaatoBundle\Entity\Site 
     */
    public function getSite2()
    {
        return $this->site_2;
    }

    /**
     * Set site_3
     *
     * @param \Ensiie\IaatoBundle\Entity\Site $site3
     * @return Planning
     */
    public function setSite3(\Ensiie\IaatoBundle\Entity\Site $site3 = null)
    {
        $this->site_3 = $site3;
    
        return $this;
    }

    /**
     * Get site_3
     *
     * @return \Ensiie\IaatoBundle\Entity\Site 
     */
    public function getSite3()
    {
        return $this->site_3;
    }

    /**
     * Set site_4
     *
     * @param \Ensiie\IaatoBundle\Entity\Site $site4
     * @return Planning
     */
    public function setSite4(\Ensiie\IaatoBundle\Entity\Site $site4 = null)
    {
        $this->site_4 = $site4;
    
        return $this;
    }

    /**
     * Get site_4
     *
     * @return \Ensiie\IaatoBundle\Entity\Site 
     */
    public function getSite4()
    {
        return $this->site_4;
    }
}
