<?php

namespace Osen\Kcb;

use Osen\Kcb\Utilities\Request;
use Osen\Kcb\Utilities\Response;

class Account extends Buni
{

    public function create(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function info(): Response
    {
        return $this->client->asJson()->post(
            'remintance-accountinfo/1.0.0',
            array(
                "header"         => array(
                    "messageID"           => "1643873344",
                    "featureCode"         => "101",
                    "featureName"         => "FinancialInquiries",
                    "serviceCode"         => "1003",
                    "serviceName"         => "AccountInfo",
                    "serviceSubCategory"  => "ACCOUNT",
                    "minorServiceVersion" => "1.0",
                    "channelCode"         => "203",
                    "channelName"         => "gateway",
                    "routeCode"           => "1",
                    "timestamp"           => "22222",
                    "serviceMode"         => "sync",
                    "subscribeEvents"     => "1",
                    "callBackURL"         => "string",
                ),
                "requestPayload" => array(
                    "transactionInfo" => array(
                        "businessKey"     => "string",
                        "businessKeyType" => "string",
                    ),
                    "optionalDetails" => array(
                        "terminalID" => "string",
                    ),
                ),
            )
        );
    }

    public function verify(): Response
    {
        return $this->client->asJson()->post('', array());
    }

    public function query(): Response
    {
        return $this->client->asJson()->post('', array());
    }
}
