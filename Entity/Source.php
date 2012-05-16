<?php

namespace Lb\RssrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lb\RssrBundle\Entity\Source
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lb\RssrBundle\Entity\SourceRepository")
 */
class Source
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=500, unique=true)
     */
    private $url;

    /**
     * @var string $rss
     *
     * @ORM\Column(name="rss", type="string", length=500, unique=true)
     */
    private $rss;

    /**
     * @var smallint $etat
     *
     * @ORM\Column(name="etat", type="smallint")
     */
    private $etat;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct(){
    	
    	$this->etat = 1;
    	$this->date = new \DateTime();
    	
    }

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set rss
     *
     * @param string $rss
     */
    public function setRss($rss)
    {
        $this->rss = $rss;
    }

    /**
     * Get rss
     *
     * @return string 
     */
    public function getRss()
    {
        return $this->rss;
    }

    /**
     * Set etat
     *
     * @param smallint $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * Get etat
     *
     * @return smallint 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }    
}