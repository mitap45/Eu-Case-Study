<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exchange;
use AppBundle\Entity\ExchangeProvider;
use AppBundle\Utils\FirstExchangeProvider;
use AppBundle\Utils\FirstExchangeProviderAdapter;
use AppBundle\Utils\LowestExchange;
use AppBundle\Utils\SecondExchangeProvider;
use AppBundle\Utils\SecondExchangeProviderAdapter;
use AppBundle\Interfaces\ExchangeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        //Defining url for apis
        $firstExchangeProviderUrl = "http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0";
        $secondExchangeProviderUrl = "http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3";

        //Getting responses from apis
        $firstResponse = $this->CallAPI($firstExchangeProviderUrl);
        $secondResponse = $this->CallAPI($secondExchangeProviderUrl);

        //Mapping responses to providers objects
        $firstExchangeProvider = $this->mapDataToFirstProviderObject($firstResponse);
        $secondExchangeProvider = $this->mapDataToSecondProviderObject($secondResponse);

        //Generating adapters for providers
        $firstProviderAdapter = new FirstExchangeProviderAdapter($firstExchangeProvider);
        $secondProviderAdapter = new SecondExchangeProviderAdapter($secondExchangeProvider);

        //Adding providers and exchanges to db
        $this->addToDb($firstProviderAdapter, 'provider1');
        $this->addToDb($secondProviderAdapter, 'provider2');

        //Generating adapters array for lowestExchanges class
        $providerAdapters = [];

        array_push($providerAdapters, $firstProviderAdapter);
        array_push($providerAdapters, $secondProviderAdapter);

        //Generating lowestExchange class
        $lowestExchange = new LowestExchange($providerAdapters);

        //Getting lowest usd, eur, gbp from LowestExchange class
        $lowestUsd = $lowestExchange->getLowestUsd();
        $lowestEur = $lowestExchange->getLowestEur();
        $lowestGbp = $lowestExchange->getLowestGbp();

        return $this->render('@App/lowest-exchanges.html.twig', array('lowestUsd' => $lowestUsd, 'lowestEur' => $lowestEur, 'lowestGbp' => $lowestGbp));

    }

    /**
     * @param $url
     * @return array
     */
    function CallAPI($url)
    {
        //Getting response from url
        $response = file_get_contents($url);

        //Checking the Http response code.
        if(http_response_code() === 200)
        {
            //Checking response content type, It must be json
            if($http_response_header[4] === 'Content-Type: application/json')
            {
                //Second parameter is for making response to array
                $responseArray = json_decode($response, true);
                return $responseArray;
            }
            else
            {
                throw new Exception('Content type must be json');
            }

        }
        else
        {
            throw new HttpException('The request has failed :'.http_response_code());
        }
    }

    function addToDb(ExchangeInterface $exchangeInterface, $providerTitle)
    {
        $em = $this->getDoctrine()->getManager();
        //Finding provider by name
        $provider = $em->getRepository('AppBundle:ExchangeProvider')->findOneBy(array('title' => $providerTitle));

        //If provider is not found then generating new provider and inserting to db.
        if(!$provider){
            $provider = new ExchangeProvider();
            $provider->setTitle($providerTitle);
            $em->persist($provider);
        }

        //Generating new exchanges and setting its properties
        $exchange = new Exchange();
        $exchange->setUsd($exchangeInterface->getUsd());
        $exchange->setEur($exchangeInterface->getEur());
        $exchange->setGbp($exchangeInterface->getGbp());
        $exchange->setProvider($provider);
        $em->persist($exchange);

        $em->flush();
    }

    /**
     * @param array $dataArray
     * @return FirstExchangeProvider
     */
    function mapDataToFirstProviderObject(array $dataArray)
    {
        $firstProvider = new FirstExchangeProvider();

        $resultArray = $dataArray["result"];

        $firstProvider->setSymbolUsd($resultArray[0]["symbol"]);
        $firstProvider->setSymbolEur($resultArray[1]["symbol"]);
        $firstProvider->setSymbolGbp($resultArray[2]["symbol"]);

        $firstProvider->setAmountUsd($resultArray[0]["amount"]);
        $firstProvider->setAmountEur($resultArray[1]["amount"]);
        $firstProvider->setAmountGbp($resultArray[2]["amount"]);

        return $firstProvider;

    }


    /**
     * @param array $dataArray
     * @return SecondExchangeProvider
     */
    function mapDataToSecondProviderObject(array $dataArray)
    {
        $secondProvider = new SecondExchangeProvider();

        $secondProvider->setKodUsd($dataArray[0]["kod"]);
        $secondProvider->setKodEur($dataArray[1]["kod"]);
        $secondProvider->setKodGbp($dataArray[2]["kod"]);

        //We are converting oran to float so that it would be comparable with first provider's data
        $secondProvider->setOranUsd(floatval($dataArray[0]["oran"]));
        $secondProvider->setOranEur(floatval($dataArray[1]["oran"]));
        $secondProvider->setOranGbp(floatval($dataArray[2]["oran"]));

        return $secondProvider;

    }



}
