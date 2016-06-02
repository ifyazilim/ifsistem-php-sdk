<?php namespace SistemApi\Service;

use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\IlceListeAyar;
use SistemApi\Model\Ilce;
use SistemApi\Model\Response\IlcePagedResponse;
use SistemApi\Model\Sehir;

class IlceService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @deprecated use liste
     *
     * @param int $sehirId
     * @return Sehir[]
     *
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function getListeBySehirId($sehirId)
    {
        // response alalım
        $response = $this->api->get('/ilce/liste-by-sehir-id/' . $sehirId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Ilce($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param IlceListeAyar $ayar
     * @return IlcePagedResponse
     *
     * @throws UnauthorizedException
     */
    public function liste(IlceListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/ilce/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new IlcePagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}