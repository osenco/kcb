<?php

namespace Osen\Kcb;

class Forex extends Buni
{
    /**
     * @var string $fromCurrency
     */
    protected $fromCurrency = 'USD';

    /**
     * @var string $toCurrency
     */
    protected $toCurrency = 'EUR';

    /**
     * @var int $amount
     * @var string $fromCurrency
     * @var string $toCurrency
     *
     * @return Osen\Kcb\Ulities\Response
     */
    public function exchange(int $amount, string $fromCurrency = null, string $toCurrency = null)
    {
        if (is_null($fromCurrency)) {
            $fromCurrency = $this->fromCurrency;
        }

        if (is_null($toCurrency)) {
            $toCurrency = $this->toCurrency;
        }

        return $this->client->post("remintance-currency-rates/1.0.0/api/CurrencyRates", array(
            "header"         => array(
                "messageID"           => "1643041286",
                "featureCode"         => "101",
                "featureName"         => "FinancialInquiries",
                "serviceCode"         => "1005",
                "serviceName"         => "CurrencyRates",
                "serviceSubCategory"  => "ACCOUNT",
                "minorServiceVersion" => "1.0",
                "channelCode"         => "206",
                "channelName"         => "ibank",
                "routeCode"           => "001",
                "timestamp"           => "1643041286",
                "serviceMode"         => "sync",
                "subscribeEvents"     => "1",
                "callbackURL"         => "string",
            ),
            "requestPayload" => array(
                "multiCurrency" => "true",
                "currencyCode"  => $fromCurrency,
                "companyCode"   => "KE0010001",
            ),
        ));
    }

    public function rates(string $fromCurrency = null)
    {
        if (is_null($fromCurrency)) {
            $fromCurrency = $this->fromCurrency;
        }

        return $this->client->asJson()->post("api/CurrencyRates", array(
            "header"         => array(
                "messageID"           => "1643041286",
                "featureCode"         => "101",
                "featureName"         => "FinancialInquiries",
                "serviceCode"         => "1005",
                "serviceName"         => "CurrencyRates",
                "serviceSubCategory"  => "ACCOUNT",
                "minorServiceVersion" => "1.0",
                "channelCode"         => "206",
                "channelName"         => "ibank",
                "routeCode"           => "001",
                "timestamp"           => "1643041286",
                "serviceMode"         => "sync",
                "subscribeEvents"     => "1",
                "callbackURL"         => "string",
            ),
            "requestPayload" => array(
                "multiCurrency" => "true",
                "currencyCode"  => $fromCurrency,
                "companyCode"   => "KE0010001",
            ),
        ));
    }

    /**
     * @param string $fromCurrency
     * @return Forex
     */
    public function from(string $fromCurrency): Forex
    {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    /**
     * @param string $toCurrency
     * @return Forex
     */
    public function to(string $toCurrency): Forex
    {
        $this->toCurrency = $toCurrency;

        return $this;
    }
}
