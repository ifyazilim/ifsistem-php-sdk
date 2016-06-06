<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\SayfaKategoriListeAyar;
use SistemApi\Model\Ayar\SayfaListeAyar;
use SistemApi\Model\Response\SayfaKategoriPagedResponse;
use SistemApi\Model\Response\SayfaPagedResponse;
use SistemApi\Model\Sayfa;
use SistemApi\Model\SayfaKategori;

class SayfaService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param SayfaListeAyar $ayar
     * @return SayfaPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(SayfaListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/sayfa/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use get
     *
     * @param int $id
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getById($id)
    {
        return $this->get($id);
    }

    /**
     * @param int $id
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated getByKodu kullanın
     *
     * @param $kodu
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getDetayByKodu($kodu)
    {
        return $this->getByKodu($kodu);
    }

    /**
     * @param string $kodu
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getByKodu($kodu)
    {
        // response alalım
        $response = $this->api->get('/sayfa/detay-by-kodu/' . $kodu);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Sayfa
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data)
    {
        // response alalım
        $response = $this->api->post('/sayfa/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Sayfa
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/sayfa/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Sayfa
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated getKategori fonksiyonunu kullanın
     *
     * @param int $id
     * @return SayfaKategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategoriById($id)
    {
        return $this->getKategori($id);
    }

    /**
     * @deprecated use liste
     *
     * @param SayfaListeAyar $ayar
     * @return SayfaPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(SayfaListeAyar $ayar = null)
    {
        return $this->liste($ayar);
    }

    /**
     * @param SayfaKategoriListeAyar $ayar
     * @return SayfaKategoriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeKategori($ayar = null)
    {
        // response alalım
        $response = $this->api->get('/sayfa/kategori/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaKategoriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return SayfaKategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategori($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/kategori/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaKategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return SayfaKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleKategori($data)
    {
        // response alalım
        $response = $this->api->post('/sayfa/kategori/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return SayfaKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleKategori($id, $data)
    {
        // response alalım
        $response = $this->api->post('/sayfa/kategori/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return SayfaKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silKategori($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/kategori/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}