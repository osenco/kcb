<?php

namespace Osen\Kcb;

class B2B extends Buni
{
    function pay()
    {
        return $this->client->post('businesTransfers/b2b/1.0.0', array());
    }
}
