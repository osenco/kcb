<?php

namespace Osen\Kcb;

use GuzzleHttp\Client;

class Buni
{
    /**
     * @var array $client
     */
    public $config;

    /**
     * @var Client $client
     */
    public $client;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new Client(array(
            'base_uri' => $config['env'] == 'sandbox' ? 'https://uat.buni.kcbgroup.com/' : 'https://buni.kcbgroup.com/',
        ));
    }

    public function notifyBiller()
    {
        return $this;
    }

    public function validateBiller()
    {
        return $this;
    }

    public function remotePost($url, $data): mixed
    {
        $response = $this->client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
            'json'    => $data,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function remoteGet($url): mixed
    {
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }
    public function remotePut($url, $data): mixed
    {
        $response = $this->client->request('PUT', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
            'json'    => $data,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function remoteDelete($url): mixed
    {
        $response = $this->client->request('DELETE', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function b2c(): B2C
    {
        return new B2C($this->config);
    }
}
