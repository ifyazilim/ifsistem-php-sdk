<?php namespace SistemApi\Service;

use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\SehirListeAyar;
use SistemApi\Model\Response\SehirPagedResponse;
use SistemApi\Model\Sehir;

class SehirService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @deprecated use liste
     *
     * @return Sehir[]
     *
     * @throws UnauthorizedException
     */
    public function getListe()
    {
        // response alalım
        $response = $this->api->get('/sehir/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Sehir($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param SehirListeAyar $ayar
     * @return SehirPagedResponse
     *
     * @throws UnauthorizedException
     */
    public function liste(SehirListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/sehir/liste-yeni', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SehirPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}