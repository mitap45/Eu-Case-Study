<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 10.03.2018
 * Time: 11:32
 */

namespace AppBundle\Interfaces;

interface ExchangeInterface
{
    function getUsd();

    function getEur();

    function getGbp();
}