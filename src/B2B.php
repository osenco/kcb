<?php

namespace Osen\Kcb;

class B2B extends Buni
{
    function send()
    {
        return $this->remotePost('businesTransfers/b2b/1.0.0', array());
    }
}
