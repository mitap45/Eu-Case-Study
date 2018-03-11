<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 10.03.2018
 * Time: 18:37
 */

namespace AppBundle\Utils;

class FirstExchangeProvider
{
    private $dataFormat;

    private $symbolUsd;

    private $amountUsd;

    private $symbolEur;

    private $amountEur;

    private $symbolGbp;

    private $amountGbp;


    /**
     * @return mixed
     */
    public function getDataFormat()
    {
        return $this->dataFormat;
    }

    /**
     * @param mixed $dataFormat
     */
    public function setDataFormat($dataFormat)
    {
        $this->dataFormat = $dataFormat;
    }

    /**
     * @return mixed
     */
    public function getSymbolUsd()
    {
        return $this->symbolUsd;
    }

    /**
     * @param mixed $symbolUsd
     */
    public function setSymbolUsd($symbolUsd)
    {
        $this->symbolUsd = $symbolUsd;
    }

    /**
     * @return mixed
     */
    public function getSymbolEur()
    {
        return $this->symbolEur;
    }

    /**
     * @param mixed $symbolEur
     */
    public function setSymbolEur($symbolEur)
    {
        $this->symbolEur = $symbolEur;
    }

    /**
     * @return mixed
     */
    public function getSymbolGbp()
    {
        return $this->symbolGbp;
    }

    /**
     * @param mixed $symbolGbp
     */
    public function setSymbolGbp($symbolGbp)
    {
        $this->symbolGbp = $symbolGbp;
    }

    /**
     * @return mixed
     */
    public function getAmountUsd()
    {
        return $this->amountUsd;
    }

    /**
     * @param mixed $amountUsd
     */
    public function setAmountUsd($amountUsd)
    {
        $this->amountUsd = $amountUsd;
    }

    /**
     * @return mixed
     */
    public function getAmountEur()
    {
        return $this->amountEur;
    }

    /**
     * @param mixed $amountEur
     */
    public function setAmountEur($amountEur)
    {
        $this->amountEur = $amountEur;
    }

    /**
     * @return mixed
     */
    public function getAmountGbp()
    {
        return $this->amountGbp;
    }

    /**
     * @param mixed $amountGbp
     */
    public function setAmountGbp($amountGbp)
    {
        $this->amountGbp = $amountGbp;
    }


}