<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\SayfaListeAyar;
use SistemApi\Model\Kategori;
use SistemApi\Model\Response\SayfaPagedResponse;
use SistemApi\Model\Sayfa;

class SayfaService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

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
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/detay-by-id/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Kategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategoriById($id)
    {
        // response alalım
        $response = $this->api->get('/sayfa/kategori/detay-by-id/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param SayfaListeAyar $sayfaListeAyar
     * @return SayfaPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(SayfaListeAyar $sayfaListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/sayfa/liste', is_null($sayfaListeAyar) ? '' : $sayfaListeAyar->serialize());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SayfaPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}