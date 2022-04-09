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
     * @return Osen\Kcb\Responses\Response
     */
    function exchange(int $amount, string $fromCurrency = null, string $toCurrency = null)
    {
        if (is_null($fromCurrency)) {
            $fromCurrency = $this->fromCurrency;
        }

        if (is_null($toCurrency)) {
            $toCurrency = $this->toCurrency;
        }

        return $this->remoteGet("forex/1.0.0/{$fromCurrency}/{$toCurrency}/{$amount}");
    }

    /**
     * @param string $fromCurrency
     * @return Forex
     */
    function from(string $fromCurrency): Forex
    {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    /**
     * @param string $toCurrency
     * @return Forex
     */
    function to(string $toCurrency): Forex
    {
        $this->toCurrency = $toCurrency;

        return $this;
    }
}
