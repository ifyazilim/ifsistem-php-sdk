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
     * @param string $address
     * @param string $body
     * @return \Httpful\Response
     */
    public function get($address, $body = '')
    {
        return Request::get('http://www.ifsistem.com/api/v1' . $address, Mime::JSON)
            ->addHeader('X-IFSISTEM-TOKEN', $this->token)
            ->body($body)
            ->send();
    }
}