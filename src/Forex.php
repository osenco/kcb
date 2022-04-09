<?php

namespace Osen\Kcb;

class Forex extends Buni
{
    function check($fromCurrency, $toCurrency, $amount)
    {
        return $this->remoteGet('forex/1.0.0/' . $fromCurrency . '/' . $toCurrency . '/' . $amount);
    }
}
