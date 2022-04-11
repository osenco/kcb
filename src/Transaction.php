<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Response;

class Transaction extends Buni
{
    public function query(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function reverse(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
