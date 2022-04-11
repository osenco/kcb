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
use Osen\Kcb\Utilities\Request;

class Buni
{
    /**
     * @var array $client
     */
    public $config;

    /**
     * @var Request $client
     */
    public $client;

    /**
     * @var array $config
     */
    public function __construct(array $config)
    {
        $this->config = array_merge(array(
            'token'  => '',
            'env'    => 'sandbox'
        ), $config);

        $this->client = new Request(new Client(array(
            'base_uri' => $config['env'] == 'sandbox' ? 'https://uat.buni.kcbgroup.com/' : 'https://buni.kcbgroup.com/',
            'verify'        => false,
        )));
    }

    function account(): Account
    {
        return new Account($this->config);
    }

    function agent(): Agent
    {
        return new Agent($this->config);
    }

    public function b2c(): B2C
    {
        return new B2C($this->config);
    }

    public function b2b(): B2B
    {
        return new B2B($this->config);
    }

    function customer(): Customer
    {
        return new Customer($this->config);
    }

    public function forex(): Forex
    {
        return new Forex($this->config);
    }

    function transaction(): Transaction
    {
        return new Transaction($this->config);
    }

    function vooma(): Vooma
    {
        return new Vooma($this->config);
    }
}
