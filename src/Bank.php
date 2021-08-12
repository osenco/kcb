<?php
namespace Osen\Kcb;

class Bank
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function notifyBiller()
    {
        return $this;
    }

    public function validateBiller()
    {
        return $this;
    }

    function post($url, array $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }

}
