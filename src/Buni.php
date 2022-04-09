<?php

/**
 * @package Buni
 * @subpackage Main Buni class
 * @author Osen Concepts <hi@osen.co.ke>
 * @version 1.0.0
 * @license MIT
 */

namespace Osen\Kcb;

use GuzzleHttp\Client;
use Osen\Kcb\Responses\Response;

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

    /**
     * @var array $config
     */
    public function __construct(array $config)
    {
        $this->config = array_merge(array(
            'token' => '',
            'env'   => 'sandbox',
        ), $config);

        $this->client = new Client(array(
            'base_uri' => $config['env'] == 'sandbox' ? 'https://uat.buni.kcbgroup.com/' : 'https://buni.kcbgroup.com/',
        ));
    }

    /**
     * @param string $url
     * @param array $data
     * 
     * @return Response
     */
    public function remotePost(string $url, array $data): Response
    {
        $response = $this->client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
            'json'    => $data,
        ]);

        return new Response($response);
    }

    /**
     * @param string $url
     * @param array $query
     * 
     * @return Response
     */
    public function remoteGet(string $url, array $query = []): Response
    {
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
        ]);

        return new Response($response);
    }

    /**
     * @param string $url
     * @param array $data
     * 
     * @return Response
     */
    public function remotePut(string $url, array $data): Response
    {
        $response = $this->client->request('PUT', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
            'json'    => $data,
        ]);

        return new Response($response);
    }

    /**
     * @param string $url
     * 
     * @return Response
     */
    public function remoteDelete($url): Response
    {
        $response = $this->client->request('DELETE', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->config['token'],
            ],
        ]);

        return new Response($response);
    }

    public function b2c(): B2C
    {
        return new B2C($this->config);
    }
}
