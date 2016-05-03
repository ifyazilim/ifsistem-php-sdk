<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\HaberKategoriListeAyar;
use SistemApi\Model\Ayar\HaberListeAyar;
use SistemApi\Model\Haber;
use SistemApi\Model\HaberKategori;
use SistemApi\Model\Kategori;
use SistemApi\Model\Response\HaberKategoriPagedResponse;
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
        $response = $this->api->get('/haber/liste-son-eklenenler/' . $adet);

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
     * @deprecated use liste
     *
     * @param HaberListeAyar $haberListeAyar
     * @return HaberPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(HaberListeAyar $haberListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/haber/liste', is_null($haberListeAyar) ? [] : $haberListeAyar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param HaberListeAyar $ayar
     * @return HaberPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(HaberListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/haber/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use get
     *
     * @param int $id
     * @return Haber
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->api->get('/haber/detay-by-id/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Haber($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Haber
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/haber/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Haber($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Haber
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data)
    {
        // response alalım
        $response = $this->api->post('/haber/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Haber($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Haber
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/haber/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Haber($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Haber
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/haber/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Haber($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use listeKategori
     *
     * @return Haber\Kategori[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
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

    /**
     * @param HaberKategoriListeAyar $ayar
     * @return HaberKategoriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeKategori(HaberKategoriListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/haber/kategori/liste-yeni', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberKategoriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use getKategori
     *
     * @param int $id
     * @return Kategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategoriById($id)
    {
        // response alalım
        $response = $this->api->get('/haber/kategori/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return HaberKategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategori($id)
    {
        // response alalım
        $response = $this->api->get('/haber/kategori/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberKategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return HaberKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleKategori($data)
    {
        // response alalım
        $response = $this->api->post('/haber/kategori/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return HaberKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleKategori($id, $data)
    {
        // response alalım
        $response = $this->api->post('/haber/kategori/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return HaberKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silKategori($id)
    {
        // response alalım
        $response = $this->api->get('/haber/kategori/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new HaberKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}