<?php
/**
 * Created by PhpStorm.
 * User: mitap-beygrup
 * Date: 10.03.2018
 * Time: 18:37
 */

namespace AppBundle\Utils;


class SecondExchangeProvider
{
    private $dataFormat;

    private $kodUsd;

    private $oranUsd;

    private $kodEur;

    private $oranEur;

    private $kodGbp;

    private $oranGbp;

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
    public function getKodUsd()
    {
        return $this->kodUsd;
    }

    /**
     * @param mixed $kodUsd
     */
    public function setKodUsd($kodUsd)
    {
        $this->kodUsd = $kodUsd;
    }

    /**
     * @return mixed
     */
    public function getKodEur()
    {
        return $this->kodEur;
    }

    /**
     * @param mixed $kodEur
     */
    public function setKodEur($kodEur)
    {
        $this->kodEur = $kodEur;
    }

    /**
     * @return mixed
     */
    public function getKodGbp()
    {
        return $this->kodGbp;
    }

    /**
     * @param mixed $kodGbp
     */
    public function setKodGbp($kodGbp)
    {
        $this->kodGbp = $kodGbp;
    }

    /**
     * @return mixed
     */
    public function getOranUsd()
    {
        return $this->oranUsd;
    }

    /**
     * @param mixed $oranUsd
     */
    public function setOranUsd($oranUsd)
    {
        $this->oranUsd = $oranUsd;
    }

    /**
     * @return mixed
     */
    public function getOranEur()
    {
        return $this->oranEur;
    }

    /**
     * @param mixed $oranEur
     */
    public function setOranEur($oranEur)
    {
        $this->oranEur = $oranEur;
    }

    /**
     * @return mixed
     */
    public function getOranGbp()
    {
        return $this->oranGbp;
    }

    /**
     * @param mixed $oranGbp
     */
    public function setOranGbp($oranGbp)
    {
        $this->oranGbp = $oranGbp;
    }

}