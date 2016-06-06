<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\MansetKategoriListeAyar;
use SistemApi\Model\Ayar\MansetListeAyar;
use SistemApi\Model\Manset;
use SistemApi\Model\MansetKategori;
use SistemApi\Model\Response\MansetKategoriPagedResponse;
use SistemApi\Model\Response\MansetPagedResponse;

class MansetService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param MansetListeAyar $ayar
     * @return MansetPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function liste(MansetListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/manset/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Manset
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/manset/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Manset($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string|null $imageOriginal
     * @param string|null $imageCropped
     * @return Manset
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data, $imageOriginal = null, $imageCropped = null)
    {
        $files = [];

        if ( ! empty($imageOriginal) || ! empty($imageCropped)) {
            $files = [
                'image_original' => $imageOriginal,
                'image_cropped' => $imageCropped
            ];
        }

        // response alalım
        $response = $this->api->post('/manset/ekle', $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Manset($response->body);
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
     * @return Manset
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function guncelle($id, $data, $imageOriginal = null, $imageCropped = null)
    {
        $files = [];

        if ( ! empty($imageOriginal) || ! empty($imageCropped)) {
            $files = [
                'image_original' => $imageOriginal,
                'image_cropped' => $imageCropped
            ];
        }

        // response alalım
        $response = $this->api->put('/manset/guncelle/' . $id, $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Manset($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Manset
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->delete('/manset/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Manset($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use liste
     *
     * @param string $kategoriKodu
     * @return Manset[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getListeByKategoriKodu($kategoriKodu)
    {
        // response alalım
        $response = $this->api->get('/manset/liste-by-kategori-kodu/' . $kategoriKodu);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Manset($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param MansetKategoriListeAyar $ayar
     * @return MansetKategoriPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeKategori(MansetKategoriListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/manset/kategori/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetKategoriPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return MansetKategori
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getKategori($id)
    {
        // response alalım
        $response = $this->api->get('/manset/kategori/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetKategori($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return MansetKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleKategori($data)
    {
        // response alalım
        $response = $this->api->post('/manset/kategori/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return MansetKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleKategori($id, $data)
    {
        // response alalım
        $response = $this->api->post('/manset/kategori/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return MansetKategori
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silKategori($id)
    {
        // response alalım
        $response = $this->api->get('/manset/kategori/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new MansetKategori($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}