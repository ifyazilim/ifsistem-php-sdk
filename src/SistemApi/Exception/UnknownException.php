<?php namespace SistemApi\Exception;

use Httpful\Response;

class UnknownException extends \RuntimeException
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
        parent::__construct();

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