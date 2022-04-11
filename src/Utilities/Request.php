<?php

namespace Osen\Kcb\Utilities;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Request implements RequestInterface
{
    protected $url;

    /**
     * @var array $headers
     */
    protected $headers = [];

    /**
     * @var StreamInterface $body
     */
    protected $body;

    protected $method;

    protected $requestTarget;

    protected $protocolVersion;

    /**
     * @var Client $client
     */
    public $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client;
    }

    public function withAddedHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function withHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function withHeaders(array $headers): Request
    {
        foreach ($headers as $key => $value) {
            $this->withHeader($key, $value);
        }

        return $this;
    }

    public function withoutHeader($name)
    {
        unset($this->headers[$name]);
        return $this;
    }

    public function withBody(StreamInterface $body)
    {
        $this->body = $body;
        return $this;
    }

    public function withRequestTarget($requestTarget)
    {
        $this->requestTarget = $requestTarget;
        return $this;
    }

    public function withMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function withUri($uri, $preserveHost = false)
    {
        $this->url = $uri;
        return $this;
    }

    public function withToken(string $token): Request
    {
        $this->withHeader('Authorization', 'Bearer ' . $token);

        return $this;
    }

    public function getRequestTarget()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUri()
    {
        return $this->url;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function hasHeader($name)
    {
        return isset($this->headers[$name]);
    }

    public function getHeader($name)
    {
        return $this->headers[$name];
    }

    public function getHeaderLine($name)
    {
        return $this->headers[$name];
    }

    public function withProtocolVersion($version)
    {
        return $this;
    }

    public function asForm(): Request
    {
        $this->withHeader('Content-Type', 'application/x-www-form-urlencoded');

        return $this;
    }

    public function asJson(): Request
    {
        $this->withHeader('Content-Type', 'application/json');

        return $this;
    }

    public function acceptJson(): Request
    {
        $this->withHeader('Accept', 'application/json');

        return $this;
    }

    public function post(): Response
    {
        $args    = \func_get_args();

        if (isset($args[0]) && !is_array($args[0])) {
            $this->url     =  $args[0];
        }

        $data    = $args[1] ?? $args[0];
        $payload = array(
            'headers' => $this->getHeaders(),
        );

        if (strtolower($this->getHeaderLine('Content-Type')) == 'application/json') {
            $payload['json'] = $data;
        } else {
            $payload['body'] = $data;
        }

        /**
         * @var ResponseInterface $response
         */
        $response = $this->client->request('POST', $this->url, $payload);

        return new Response($response);
    }

    public function get(string $url, array $query = [])
    {
        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        $payload = array(
            'headers' => $this->getHeaders(),
        );

        /**
         * @var ResponseInterface $response
         */
        $response = $this->client->request('GET', $url, $payload);

        return new Response($response);
    }

    function dd()
    {
        exit(var_dump($this));
    }
}
