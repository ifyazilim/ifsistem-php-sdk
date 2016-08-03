<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\SiparisListeAyar;
use SistemApi\Model\Response\SiparisPagedResponse;
use SistemApi\Model\Siparis;
use SistemApi\Model\Siparis\SiparisKargoYontem;
use SistemApi\Model\Siparis\SiparisOdemeYontem;
use SistemApi\Model\Siparis\SiparisUrun;

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
            case 500: throw new InternalApiErrorException($response);
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
            case 500: throw new InternalApiErrorException($response);

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
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Siparis
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/siparis/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Siparis
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/siparis/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
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
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $siparisId
     * @param int $siparisUrunId
     * @param array $data
     * @return SiparisUrun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function guncelleUrun($siparisId, $siparisUrunId, $data)
    {
        // response alalım
        $response = $this->api->post('/siparis/urun/guncelle/' . $siparisId . '/' . $siparisUrunId, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiparisUrun($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated
     *
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
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return Siparis\SiparisDurum[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeDurum()
    {
        // response alalım
        $response = $this->api->get('/siparis/durum/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return array_map(function($item) {
                return new Siparis\SiparisDurum($item);
            }, $response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Siparis\SiparisDurum
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getDurum($id)
    {
        // response alalım
        $response = $this->api->get('/siparis/durum/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis\SiparisDurum($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Siparis\SiparisDurum
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleDurum($data)
    {
        // response alalım
        $response = $this->api->post('/siparis/durum/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis\SiparisDurum($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Siparis\SiparisDurum
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleDurum($id, $data)
    {
        // response alalım
        $response = $this->api->post('/siparis/durum/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis\SiparisDurum($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Siparis\SiparisDurum
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silDurum($id)
    {
        // response alalım
        $response = $this->api->get('/siparis/durum/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Siparis\SiparisDurum($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return SiparisOdemeYontem[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOdemeYontem()
    {
        // response alalım
        $response = $this->api->get('/siparis/odeme-yontem/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return array_map(function($item) {
                return new SiparisOdemeYontem($item);
            }, $response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return SiparisKargoYontem[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeKargoYontem()
    {
        // response alalım
        $response = $this->api->get('/siparis/kargo-yontem/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return array_map(function($item) {
                return new SiparisKargoYontem($item);
            }, $response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}