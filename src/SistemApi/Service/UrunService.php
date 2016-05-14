<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\Urun\OzellikGrupListeAyar;
use SistemApi\Model\Ayar\UrunKategoriListeAyar;
use SistemApi\Model\Ayar\UrunListeAyar;
use SistemApi\Model\Response\UrunKategoriPagedResponse;
use SistemApi\Model\Response\UrunPagedResponse;
use SistemApi\Model\Urun;
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
     * @param UrunListeAyar $ayar
     * @return UrunPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(UrunListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/urun/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use listeKategori
     *
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
     * @param UrunKategoriListeAyar $ayar
     * @return UrunKategoriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeKategori(UrunKategoriListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/kategori/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunKategoriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return UrunKategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategori($id)
    {
        // response alalım
        $response = $this->api->get('/urun/kategori/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunKategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string $resim
     * @return UrunKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleKategori($data, $resim)
    {
        // response alalım
        $response = $this->api->post('/urun/kategori/ekle', $data, [
            'resim' => $resim
        ]);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return UrunKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleKategori($id, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/kategori/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use listeOzellikGrup
     *
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

    /**
     * @param OzellikGrupListeAyar $ayar
     * @return UrunKategori[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOzellikGrup(OzellikGrupListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-grup/liste', is_null($ayar) ? [] : $ayar->toArray());

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

    /**
     * @param int $id
     * @return UrunKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silKategori($id)
    {
        // response alalım
        $response = $this->api->get('/urun/kategori/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunKategori($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}