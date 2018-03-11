<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExchangeProvider
 *
 * @ORM\Table(name="exchange_provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeProviderRepository")
 */
class ExchangeProvider
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Exchange", mappedBy="provider")
     */
    private $exchanges;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ExchangeProvider
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exchanges = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add exchange
     *
     * @param \AppBundle\Entity\Exchange $exchange
     *
     * @return ExchangeProvider
     */
    public function addExchange(\AppBundle\Entity\Exchange $exchange)
    {
        $this->exchanges[] = $exchange;

        return $this;
    }

    /**
     * Remove exchange
     *
     * @param \AppBundle\Entity\Exchange $exchange
     */
    public function removeExchange(\AppBundle\Entity\Exchange $exchange)
    {
        $this->exchanges->removeElement($exchange);
    }

    /**
     * Get exchanges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExchanges()
    {
        return $this->exchanges;
    }
}
