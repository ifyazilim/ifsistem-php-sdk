<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\SiparisListeAyar;
use SistemApi\Model\Response\SiparisPagedResponse;
use SistemApi\Model\Siparis;
use SistemApi\Model\Siparis\SiparisUrun;
use SistemApi\Model\Urun;

class SiparisService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param SiparisListeAyar $ayar
     * @return SiparisPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(SiparisListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/siparis/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiparisPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Siparis
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/siparis/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Siparis
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data)
    {
        // response alalım
        $response = $this->api->post('/siparis/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $siparisId
     * @param array $data
     * @return SiparisUrun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleUrun($siparisId, $data)
    {
        // response alalım
        $response = $this->api->post('/siparis/urun/ekle/' . $siparisId, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiparisUrun($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Siparis\SiparisAdres
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleAdres($data)
    {
        // response alalım
        $response = $this->api->post('/siparis/adres/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis\SiparisAdres($response->body);
            case 400: throw new BadRequestException($response->body->mesaj);
            case 401: throw new UnauthorizedException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}