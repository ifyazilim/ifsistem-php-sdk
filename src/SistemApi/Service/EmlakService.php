<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\EmlakDanismanListeAyar;
use SistemApi\Model\Ayar\EmlakIlanListeAyar;
use SistemApi\Model\EmlakDanisman;
use SistemApi\Model\EmlakIlan;
use SistemApi\Model\EmlakKategori;
use SistemApi\Model\EmlakTip;
use SistemApi\Model\EmlakTur;
use SistemApi\Model\Resim;
use SistemApi\Model\Response\EmlakDanismanPagedResponse;
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
     * @throws UnauthorizedException
     */
    public function listeTip()
    {
        // response alalım
        $response = $this->api->get('/emlak/tip/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakTip($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return EmlakTur[]
     * @throws UnauthorizedException
     */
    public function listeTur()
    {
        // response alalım
        $response = $this->api->get('/emlak/tur/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakTur($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);

    }

    /**
     * @return EmlakKategori[]
     * @throws UnauthorizedException
     */
    public function listeKategori()
    {
        // response alalım
        $response = $this->api->get('/emlak/kategori/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new EmlakKategori($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param EmlakIlanListeAyar $ayar
     * @return EmlakIlanPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeIlan(EmlakIlanListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakIlanPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
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
    public function getIlan($id)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakIlan($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return EmlakIlan
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleIlan($data)
    {
        // response alalım
        $response = $this->api->post('/emlak/ilan/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {
            case 200: return new EmlakIlan($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return EmlakIlan
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleIlan($id, $data)
    {
        // response alalım
        $response = $this->api->post('/emlak/ilan/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {
            case 200: return new EmlakIlan($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return EmlakIlan
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silIlan($id)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {
            case 200: return new EmlakIlan($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param EmlakDanismanListeAyar $ayar
     * @return EmlakDanismanPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeDanisman($ayar = null)
    {
        // response alalım
        $response = $this->api->get('/emlak/danisman/liste', empty($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakDanismanPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return EmlakDanisman
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getDanisman($id)
    {
        // response alalım
        $response = $this->api->get('/emlak/danisman/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakDanisman($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string $resim
     * @return EmlakDanisman
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleDanisman($data, $resim)
    {
        // response alalım
        $response = $this->api->post('/emlak/danisman/ekle', $data, [
            'resim' => $resim
        ]);

        // durum koduna göre işlem yapalım
        switch ($response->code) {
            case 200: return new EmlakDanisman($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @param string $resim
     * @return EmlakDanisman
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleDanisman($id, $data, $resim = null)
    {
        $files = [];

        if ( ! is_null($resim)) {
            $files = [
                'resim' => $resim
            ];
        }

        // response alalım
        $response = $this->api->post('/emlak/danisman/guncelle/' . $id, $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {
            case 200: return new EmlakDanisman($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return EmlakDanisman
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silDanisman($id)
    {
        // response alalım
        $response = $this->api->get('/emlak/danisman/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakDanisman($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $ilanId
     * @return Resim[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function listeIlanResim($ilanId)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan/resim/liste/' . $ilanId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Resim($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $ilanId
     * @param string $resim
     * @return Resim
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function ekleIlanResim($ilanId, $resim)
    {
        // response alalım
        $response = $this->api->post('/emlak/ilan/resim/ekle/' . $ilanId, [], [
            'resim' => $resim
        ]);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Resim($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param int $resimId
     * @return EmlakIlan
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silIlanResim($id, $resimId)
    {
        // response alalım
        $response = $this->api->get('/emlak/ilan/resim/sil/' . $id . '/' . $resimId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new EmlakIlan($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}