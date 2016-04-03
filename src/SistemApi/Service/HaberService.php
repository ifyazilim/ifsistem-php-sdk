<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\HaberListeAyar;
use SistemApi\Model\Haber;
use SistemApi\Model\Response\HaberPagedResponse;

class HaberService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param int $adet
     * @return Haber[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getListeSonEklenenler($adet = 4)
    {
        // response alalım
        $response = $this->api->get('/manset/liste-by-kategori-kodu/' . $adet);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Haber($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param HaberListeAyar $haberListeAyar
     * @return HaberPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(HaberListeAyar $haberListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/haber/liste', is_null($haberListeAyar) ? [] : $haberListeAyar->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @return Haber\Kategori[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategoriListe()
    {
        // response alalım
        $response = $this->api->get('/haber/kategori/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Haber\Kategori($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}