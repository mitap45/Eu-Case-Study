<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 11.03.2018
 * Time: 21:33
 */

namespace AppBundle\Utils;

use AppBundle\Interfaces\ExchangeInterface;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class LowestExchange
{
    private $exchangeProviders;

    public function __construct($exchangeProviders = array()) {
        $this->exchangeProviders = $exchangeProviders;
    }

    /**
     * Getting lowest usd from set of class that implements exchange interface
     * @return mixed
     */
    public function getLowestUsd()
    {
        $lowestUsd = INF;
        foreach($this->exchangeProviders as $exchangeProvider) {

            if($exchangeProvider instanceof ExchangeInterface) {

                if ($exchangeProvider->getUsd() < $lowestUsd)
                    $lowestUsd = $exchangeProvider->getUsd();

            }else{
                throw new UnprocessableEntityHttpException('Object must implement exchange interface to get lowest USD exchange');
            }
        }

        return $lowestUsd;
    }

    /**
     * Getting lowest euro from set of class that implements exchange interface
     * @return mixed
     */
    public function getLowestEur()
    {
        $lowestEur = INF;
        foreach($this->exchangeProviders as $exchangeProvider) {

            if($exchangeProvider instanceof ExchangeInterface) {

                if ($exchangeProvider->getEur() < $lowestEur)
                    $lowestEur = $exchangeProvider->getEur();

            }else{
                throw new UnprocessableEntityHttpException('Object must implement exchange interface to get lowest EUR exchange');
            }
        }

        return $lowestEur;

    }

    /**
     * Getting lowest gbp from set of class that implements exchange interface
     * @return mixed
     */
    public function getLowestGbp()
    {
        $lowestGbp = INF;
        foreach($this->exchangeProviders as $exchangeProvider) {

            if($exchangeProvider instanceof ExchangeInterface) {

                if ($exchangeProvider->getGbp() < $lowestGbp)
                    $lowestGbp = $exchangeProvider->getGbp();

            }else{
                throw new UnprocessableEntityHttpException('Object must implement exchange interface to get lowest Gbp exchange');
            }
        }

        return $lowestGbp;

    }


}