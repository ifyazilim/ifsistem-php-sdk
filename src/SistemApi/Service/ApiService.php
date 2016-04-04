<?php namespace SistemApi\Service;

use Httpful\Mime;
use Httpful\Request;

class ApiService
{
    /**
     * @var string
     */
    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param string $uri
     * @param string $body
     *
     * @return \Httpful\Response
     */
    public function get($uri, $body = '')
    {
        return Request::get('http://ifsistem.app/api/v1' . $uri, Mime::JSON)
            ->addHeader('X-IFSISTEM-TOKEN', $this->token)
            ->body($body)
            ->send();
    }

    public function post($uri, $payload = null)
    {
        return Request::post('http://ifsistem.app/api/v1' . $uri, $payload, Mime::JSON)
            ->addHeader('X-IFSISTEM-TOKEN', $this->token)
            ->sendsAndExpects(Mime::JSON)
            ->send();
    }
}