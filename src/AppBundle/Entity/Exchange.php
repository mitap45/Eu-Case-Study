<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exchange
 *
 * @ORM\Table(name="exchange")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeRepository")
 */
class Exchange
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
     * @var float
     *
     * @ORM\Column(name="usd", type="float")
     */
    private $usd;

    /**
     * @var float
     *
     * @ORM\Column(name="eur", type="float")
     */
    private $eur;

    /**
     * @var float
     *
     * @ORM\Column(name="gbp", type="float")
     */
    private $gbp;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ExchangeProvider", inversedBy="exchanges")
     * @ORM\JoinColumn(name="provider", referencedColumnName="id")
     */
    private $provider;


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
     * Set usd
     *
     * @param float $usd
     *
     * @return Exchange
     */
    public function setUsd($usd)
    {
        $this->usd = $usd;

        return $this;
    }

    /**
     * Get usd
     *
     * @return float
     */
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * Set eur
     *
     * @param float $eur
     *
     * @return Exchange
     */
    public function setEur($eur)
    {
        $this->eur = $eur;

        return $this;
    }

    /**
     * Get eur
     *
     * @return float
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * Set gbp
     *
     * @param float $gbp
     *
     * @return Exchange
     */
    public function setGbp($gbp)
    {
        $this->gbp = $gbp;

        return $this;
    }

    /**
     * Get gbp
     *
     * @return float
     */
    public function getGbp()
    {
        return $this->gbp;
    }

    /**
     * Set provider
     *
     * @param \AppBundle\Entity\ExchangeProvider $provider
     *
     * @return Exchange
     */
    public function setProvider(ExchangeProvider $provider = null)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return \AppBundle\Entity\ExchangeProvider
     */
    public function getProvider()
    {
        return $this->provider;
    }
}
