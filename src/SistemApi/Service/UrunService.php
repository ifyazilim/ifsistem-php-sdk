<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\Urun\SiparisListeAyar;
use SistemApi\Model\Ayar\UrunKategoriListeAyar;
use SistemApi\Model\Ayar\UrunListeAyar;
use SistemApi\Model\Response\Urun\SiparisPagedResponse;
use SistemApi\Model\Response\UrunKategoriPagedResponse;
use SistemApi\Model\Response\UrunPagedResponse;
use SistemApi\Model\Urun\SiparisAdres;
use SistemApi\Model\UrunKategori;
use SistemApi\Model\UrunOzellikGrup;
use SistemApi\Model\UrunSiparis;
use SistemApi\Model\UrunSiparisUrun;

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

    /**
     * @param SiparisListeAyar $ayar
     * @return SiparisPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeSiparis(SiparisListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/siparis/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiparisPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return UrunSiparis
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getSiparis($id)
    {
        // response alalım
        $response = $this->api->get('/urun/siparis/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunSiparis($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return UrunSiparis
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleSiparis($data)
    {
        // response alalım
        $response = $this->api->post('/urun/siparis/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunSiparis($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $siparisId
     * @param array $data
     * @return UrunSiparisUrun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleSiparisUrun($siparisId, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/siparis/' . $siparisId . '/urun/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new UrunSiparisUrun($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return SiparisAdres
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleSiparisAdres($data)
    {
        // response alalım
        $response = $this->api->post('/urun/siparis-adres/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiparisAdres($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}