<?php namespace SistemApi\Service;

use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\UrunKategori;
use SistemApi\Model\UrunOzellikGrup;

class UrunService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @return UrunKategori[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListeKategori()
    {
        // response alalım
        $response = $this->api->get('/urun/kategori-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new UrunKategori($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @return UrunKategori[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListeOzellikGrup()
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-grup-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new UrunOzellikGrup($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}