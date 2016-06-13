<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\GaleriIcerikListeAyar;
use SistemApi\Model\Ayar\GaleriListeAyar;
use SistemApi\Model\Galeri;
use SistemApi\Model\GaleriIcerik;
use SistemApi\Model\Haber;
use SistemApi\Model\Response\GaleriIcerikPagedResponse;
use SistemApi\Model\Response\GaleriPagedResponse;

class GaleriService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @deprecated use get
     *
     * @param int $id
     * @return Galeri
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getById($id)
    {
        // response alalım
        $response = $this->api->get('/galeri/detay-by-id/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Galeri($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $adet
     * @return GaleriIcerik[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getListeSonEklenenler($adet = 4)
    {
        // response alalım
        $response = $this->api->get('/galeri/resim/liste-son-eklenenler/' . $adet);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new GaleriIcerik($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $galeriId
     * @param GaleriIcerikListeAyar $galeriIcerikListeAyar
     * @return GaleriIcerikPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getIcerikListeByGaleriId($galeriId, GaleriIcerikListeAyar $galeriIcerikListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/galeri/icerik/liste/' . $galeriId, is_null($galeriIcerikListeAyar) ? [] : $galeriIcerikListeAyar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriIcerikPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use liste
     *
     * @param GaleriListeAyar $galeriListeAyar
     * @return GaleriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getListe(GaleriListeAyar $galeriListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/galeri/liste', is_null($galeriListeAyar) ? [] : $galeriListeAyar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param GaleriListeAyar $galeriListeAyar
     * @return GaleriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(GaleriListeAyar $galeriListeAyar = null)
    {
        // response alalım
        $response = $this->api->get('/galeri/liste', is_null($galeriListeAyar) ? [] : $galeriListeAyar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Galeri
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/galeri/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Galeri($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Galeri
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data = [])
    {
        // response alalım
        $response = $this->api->post('/galeri/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Galeri($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Galeri
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/galeri/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Galeri($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Galeri
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/galeri/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Galeri($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return GaleriIcerik
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getIcerik($id)
    {
        // response alalım
        $response = $this->api->get('/galeri/icerik/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriIcerik($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return GaleriIcerik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleIcerik($data = [])
    {
        // response alalım
        $response = $this->api->post('/galeri/icerik/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriIcerik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @param string|null $imageOriginal
     * @param string|null $imageCropped
     * @return GaleriIcerik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleIcerik($id, $data, $imageOriginal = null, $imageCropped = null)
    {
        $files = [];

        if ( ! empty($imageOriginal) && ! empty($imageCropped)) {
            $files = [
                'image_original' => $imageOriginal,
                'image_cropped' => $imageCropped
            ];
        }

        // response alalım
        $response = $this->api->post('/galeri/icerik/guncelle/' . $id, $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriIcerik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return GaleriIcerik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silIcerik($id)
    {
        // response alalım
        $response = $this->api->get('/galeri/icerik/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new GaleriIcerik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}