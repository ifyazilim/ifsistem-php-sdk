<?php namespace SistemApi\Service;

use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Semt;

class SemtService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param int $ilceId
     * @return Semt[]
     *
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function getListeByIlceId($ilceId)
    {
        // response alalım
        $response = $this->api->get('/semt/liste-by-ilce-id/' . $ilceId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Semt($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}