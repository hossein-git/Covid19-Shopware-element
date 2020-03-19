<?php

namespace AriyaCoid19\Components\Emotion\Preset\ComponentHandler;

use Shopware\Bundle\EmotionBundle\ComponentHandler\ComponentHandlerInterface;
use Shopware\Bundle\EmotionBundle\Struct\Collection\PrepareDataCollection;
use Shopware\Bundle\EmotionBundle\Struct\Collection\ResolvedDataCollection;
use Shopware\Bundle\EmotionBundle\Struct\Element;
use Shopware\Bundle\StoreFrontBundle\Struct\ShopContextInterface;


class AriyaCoid19ComponentHandler implements ComponentHandlerInterface
{

    /**
     * API URL for all cases
     * @var string
     */
    private $allCaseUrl;

    /**
     * API URL for Countries
     * @var string
     */
    private $countriesUrl;


    public function supports(Element $element)
    {
        return $element->getComponent()->getTemplate() === 'emotion_coid19';
    }

    /**
     * {@inheritdoc}
     */
    public function prepare(PrepareDataCollection $collection, Element $element, ShopContextInterface $context)
    {

        if ($allCaseApi = $element->getConfig()->get('allCaseApi')) {
            $this->allCaseUrl = $allCaseApi;
        } else {
            $this->allCaseUrl = 'https://corona.lmao.ninja/all';
        }

        if ($countriesApi = $element->getConfig()->get('countriesApi')) {
            $this->countriesUrl = $countriesApi;
        } else {
            $this->countriesUrl = 'https://corona.lmao.ninja/countries';
        }
        

    }

    /**
     * @param ResolvedDataCollection $collection
     * @param Element                $element
     * @param ShopContextInterface   $context
     */
    public function handle(ResolvedDataCollection $collection, Element $element, ShopContextInterface $context)
    {

        $element->getConfig()->set('allCases', $this->allCase());
        $element->getConfig()->set('allCountries', $this->allCountries());
    }

    /**
     * @return false|resource
     */
    private function allCase()
    {
        return $this->setCurl($this->allCaseUrl);
    }

    /**
     * @return false|resource
     */
    private function allCountries()
    {
        return $this->setCurl($this->countriesUrl);
    }

    /**
     * @param string $url
     * @return bool|resource
     */
    private function setCurl(string $url)
    {
        $curlRequest = curl_init($url);
        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curlRequest);
        curl_close($curlRequest);
        return json_decode($result, true);

    }


}
