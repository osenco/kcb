<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Response;

class B2C extends Buni
{
    function pay(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
