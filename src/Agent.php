<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Response;

class Agent extends Buni
{
    public function customer(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function deposit(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function widthraw(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
