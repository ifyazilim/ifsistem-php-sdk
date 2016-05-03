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
     * @param string $body
     *
     * @return \Httpful\Response
     */
    public function get($uri, $body = '')
    {
        return Request::get($this->uri . $uri, Mime::JSON)
            ->addHeader('X-IFSISTEM-TOKEN', $this->token)
            ->body($body)
            ->send();
    }

    public function post($uri, $payload = [], $files = [])
    {
        $request = Request::post($this->uri . $uri, empty($payload) ? null : $payload, Mime::JSON)
            ->addHeader('X-IFSISTEM-TOKEN', $this->token)
            ->sendsAndExpects(Mime::JSON);

        // files boş değilse
        if ( ! empty($files))
            $request = $request->attach($files);

        return $request->send();
    }
}