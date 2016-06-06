<?php namespace SistemApi\Exception;

use Unirest\Response;

class BadRequestException extends \RuntimeException
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @param Response $response
     */
    public function __construct($response)
    {
        parent::__construct($response->body->mesaj);

        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}