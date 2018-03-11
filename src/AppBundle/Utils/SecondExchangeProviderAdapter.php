<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 10.03.2018
 * Time: 20:36
 */

namespace AppBundle\Utils;

use AppBundle\Interfaces\ExchangeInterface;

class SecondExchangeProviderAdapter implements ExchangeInterface
{
    public $secondExchangeProvider;

    function __construct(SecondExchangeProvider $secondExchangeProvider)
    {
        $this->secondExchangeProvider = $secondExchangeProvider;
    }

    function getUsd()
    {
        return $this->secondExchangeProvider->getOranUsd();
    }

    function getEur()
    {
        return $this->secondExchangeProvider->getOranEur();
    }

    function getGbp()
    {
        return $this->secondExchangeProvider->getOranGbp();
    }
}