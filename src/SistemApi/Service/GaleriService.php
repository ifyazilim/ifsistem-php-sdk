<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\GaleriListeAyar;
use SistemApi\Model\GaleriIcerik;
use SistemApi\Model\Haber;
use SistemApi\Model\Response\GaleriPagedResponse;

class GaleriService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param int $adet
     * @return GaleriIcerik[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getListeSonEklenenler($adet = 4)
    {
        // response alalım
        $response = $this->api->get('/galeri/resim/liste-son-eklenenler/' . $adet);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new GaleriIcerik($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param GaleriListeAyar $galeriListeAyar
     * @return GaleriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(GaleriListeAyar $galeriListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/galeri/liste', is_null($galeriListeAyar) ? '' : $galeriListeAyar->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}