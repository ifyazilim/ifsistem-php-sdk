<?php namespace SistemApi\Service;

use Unirest\Request;
use Unirest\Response;

class ApiService
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $uri;

    /**
     * @param string $token
     * @param string $uri
     */
    public function __construct($token, $uri)
    {
        $this->token = $token;
        $this->uri = $uri;
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @return Response
     */
    public function get($uri, $query = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'X-IFSISTEM-TOKEN' => $this->token
        ];

        return Request::get($this->uri . $uri, $headers, $query);
    }

    public function post($uri, $data = [], $files = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'X-IFSISTEM-TOKEN' => $this->token
        ];

        $body = empty($files) ? Request\Body::Json($data) : Request\Body::multipart($data, $files);

        return Request::post($this->uri . $uri, $headers, $body);
    }
}