<?php

namespace Osen\Kcb\Utilities;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var ResponseInterface $response
     */
    protected $response;

    /**
     * @var ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return int HTTP status code
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return mixed|string
     */
    public function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    /**
     * @return array
     */
    public function json(): array
    {
        return json_decode($this->response->getBody()->getContents(), true);
    }

    /**
     * @return object
     */
    public function object(): object
    {
        return json_decode($this->response->getBody()->getContents());
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function throw(): Response
    {
        $json = $this->json();

        if ($this->getStatusCode() == 200) {
            return $this;
        }

        throw new \Exception($json['message'], $json['code']);
    }
}
