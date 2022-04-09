<?php

namespace Osen\Kcb\Buni\Responses;

use Psr\Http\Message\ResponseInterface;

class Response
{

    function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    function getBody()
    {
        return $this->response->getBody();
    }

    function getHeaders()
    {
        return $this->response->getHeaders();
    }

    function json()
    {
        return json_decode($this->response->getBody()->getContents(), true);
    }

    function object()
    {
        return json_decode($this->response->getBody()->getContents());
    }

    function throw(): Response
    {
        $json = $this->json();

        if ($this->getStatusCode() == 200) {
            return $this;
        }

        throw new \Exception($json['message'], $json['code']);
    }
}
