<?php namespace SistemApi\Service;

use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\KullaniciListeAyar;
use SistemApi\Model\Response\KullaniciPagedResponse;

class KullaniciService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param KullaniciListeAyar $ayar
     * @return KullaniciPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(KullaniciListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/kullanici/liste', is_null($ayar) ? '' : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new KullaniciPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}