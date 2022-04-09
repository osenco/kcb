<?php

namespace Osen\Kcb;

class Forex extends Buni
{
    protected $fromCurrency = 'USD';
    protected $toCurrency = 'EUR';

    function exchange($amount, $fromCurrency = null, $toCurrency = null)
    {
        if (\is_null($fromCurrency)) {
            $fromCurrency = $this->fromCurrency;
        }

        if (\is_null($toCurrency)) {
            $toCurrency = $this->toCurrency;
        }

        return $this->remoteGet('forex/1.0.0/' . $fromCurrency . '/' . $toCurrency . '/' . $amount);
    }

    function from($fromCurrency)
    {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    function to($toCurrency)
    {
        $this->toCurrency = $toCurrency;

        return $this;
    }
}
