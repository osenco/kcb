<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Response;

class Customer extends Buni
{
    public function query(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
