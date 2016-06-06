<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
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
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Kullanici
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws InternalApiErrorException
     * @throws UnknownException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/kullanici/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kullanici($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string|null $orjinalResim
     * @param string|null $kirpilmisResim
     * @return Kullanici
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data, $orjinalResim = null, $kirpilmisResim = null)
    {
        $files = [];

        if ( ! empty($orjinalResim) || ! empty($kirpilmisResim)) {
            $files = [
                'orjinal_resim' => $orjinalResim,
                'kirpilmis_resim' => $kirpilmisResim
            ];
        }

        // response alalım
        $response = $this->api->post('/kullanici/ekle', $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kullanici($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @param string|null $orjinalResim
     * @param string|null $kirpilmisResim
     * @return Kullanici
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data, $orjinalResim = null, $kirpilmisResim = null)
    {
        $files = [];

        if ( ! empty($orjinalResim) || ! empty($kirpilmisResim)) {
            $files = [
                'orjinal_resim' => $orjinalResim,
                'kirpilmis_resim' => $kirpilmisResim
            ];
        }

        // response alalım
        $response = $this->api->post('/kullanici/guncelle/' . $id, $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kullanici($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Kullanici
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/kullanici/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Kullanici($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
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
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}