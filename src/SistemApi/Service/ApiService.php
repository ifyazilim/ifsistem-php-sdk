<?php namespace SistemApi\Service;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Unirest\Request;
use Unirest\Response;

class ApiService
{
    /**
     * @var string
     */
    private $token;

    /**ü
     * @var int
     */
    private $dilId = 1;

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
     * @return ResponseInterface
     */
    public function get($uri, $query = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'X-IFSISTEM-TOKEN' => $this->token,
            'X-IFSISTEM-DIL-ID' => $this->dilId
        ];

        $client = new Client();

        return $client->get($this->uri . $uri, [
            'http_errors' => false,
            'headers' => $headers,
            'query' => $query
        ]);
    }

    public function post($uri, $data = [], $files = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => empty($files) ? 'application/json' : 'multipart/form-data',
            'X-IFSISTEM-TOKEN' => $this->token,
            'X-IFSISTEM-DIL-ID' => $this->dilId
        ];

        $body = empty($files) ? Request\Body::Json($data) : Request\Body::multipart($data, $files);

        return Request::post($this->uri . $uri, $headers, $body);
    }

    public function put($uri, $data = [], $files = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => empty($files) ? 'application/json' : 'multipart/form-data',
            'X-IFSISTEM-TOKEN' => $this->token,
            'X-IFSISTEM-DIL-ID' => $this->dilId
        ];

        $body = empty($files) ? Request\Body::Json($data) : Request\Body::multipart($data, $files);

        return Request::put($this->uri . $uri, $headers, $body);
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @return Response
     */
    public function delete($uri, $query = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'X-IFSISTEM-TOKEN' => $this->token,
            'X-IFSISTEM-DIL-ID' => $this->dilId
        ];

        return Request::delete($this->uri . $uri, $headers, $query);
    }

    /**
     * @param int $dilId
     */
    public function setDilId($dilId)
    {
        $this->dilId = $dilId;
    }
}