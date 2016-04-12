<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\EmlakIlanListeAyar;
use SistemApi\Model\EmlakDanisman;
use SistemApi\Model\EmlakIlan;
use SistemApi\Model\EmlakKategori;
use SistemApi\Model\EmlakTip;
use SistemApi\Model\EmlakTur;
use SistemApi\Model\Response\EmlakIlanPagedResponse;

class EmlakService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @return EmlakTip[]
     *
     * @throws UnauthorizedException
     */
    public function getListeTipler()
    {
        // response alalım
        $response = $this->api->get('/emlak/tip-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakTip($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @return EmlakTip[]
     *
     * @throws UnauthorizedException
     */
    public function getListeTurler()
    {
        // response alalım
        $response = $this->api->get('/emlak/tur-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakTur($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @return EmlakKategori[]
     *
     * @throws UnauthorizedException
     */
    public function getListeKategoriler()
    {
        // response alalım
        $response = $this->api->get('/emlak/kategori-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakKategori($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @return EmlakDanisman[]
     *
     * @throws UnauthorizedException
     */
    public function getListeDanismanlar()
    {
        // response alalım
        $response = $this->api->get('/emlak/danisman-liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakDanisman($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param EmlakIlanListeAyar $emlakIlanListeAyar
     * @return EmlakIlanPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListeIlanlar(EmlakIlanListeAyar $emlakIlanListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan-liste', is_null($emlakIlanListeAyar) ? '' : $emlakIlanListeAyar->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakIlanPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param EmlakIlanListeAyar $emlakIlanListeAyar
     * @return int
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getAdetIlanlar(EmlakIlanListeAyar $emlakIlanListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan-adet', is_null($emlakIlanListeAyar) ? '' : $emlakIlanListeAyar->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return $response->body;
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return EmlakIlan
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getIlanDetay($id)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan-detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakIlan($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }
}