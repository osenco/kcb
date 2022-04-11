<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Response;

class Vooma extends Buni
{
    public function query(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function widthraw(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
