<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 11.03.2018
 * Time: 00:28
 */

namespace AppBundle\Utils;


use AppBundle\Interfaces\ExchangeInterface;

class FirstExchangeProviderAdapter implements ExchangeInterface
{
    public $firstExchangeProvider;

    function __construct(FirstExchangeProvider $firstExchangeProvider)
    {
        $this->firstExchangeProvider = $firstExchangeProvider;
    }

    function getUsd()
    {
        return $this->firstExchangeProvider->getAmountUsd();
    }

    function getEur()
    {
        return $this->firstExchangeProvider->getAmountEur();
    }

    function getGbp()
    {
        return $this->firstExchangeProvider->getAmountGbp();
    }
}