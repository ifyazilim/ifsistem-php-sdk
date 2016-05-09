<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\KullaniciListeAyar;
use SistemApi\Model\Kullanici;
use SistemApi\Model\KullaniciAdres;
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
        $response = $this->api->get('/kullanici/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new KullaniciPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Kullanici
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data)
    {
        // response alalım
        $response = $this->api->post('/kullanici/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kullanici($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $kullaniciId
     * @param array $data
     * @return KullaniciAdres
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleAdres($kullaniciId, $data)
    {
        // response alalım
        $response = $this->api->post('/kullanici/' . $kullaniciId . '/adres/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new KullaniciAdres($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}