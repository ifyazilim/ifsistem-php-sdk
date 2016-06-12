<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\Urun\OzellikGrupListeAyar;
use SistemApi\Model\Ayar\Urun\OzellikListeAyar;
use SistemApi\Model\Ayar\UrunKategoriListeAyar;
use SistemApi\Model\Ayar\UrunListeAyar;
use SistemApi\Model\Product\ProductCategory;
use SistemApi\Model\Resim;
use SistemApi\Model\Response\Urun\OzellikPagedResponse;
use SistemApi\Model\Response\UrunKategoriPagedResponse;
use SistemApi\Model\Response\UrunPagedResponse;
use SistemApi\Model\Urun;
use SistemApi\Model\Urun\OzellikSet;
use SistemApi\Model\Urun\OzellikTur;

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
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/urun/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Urun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data = [])
    {
        // response alalım
        $response = $this->api->post('/urun/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Urun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function sil($id)
    {
        // response alalım
        $response = $this->api->get('/urun/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use listeKategori
     *
     * @return ProductCategory[]
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
                    return new ProductCategory($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
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
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return ProductCategory
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

            case 200: return new ProductCategory($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string $resim
     * @return ProductCategory
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleKategori($data, $resim = null)
    {
        $files = [];

        if ( ! empty($resim)) {
            $files = [
                'resim' => $resim
            ];
        }

        // response alalım
        $response = $this->api->post('/urun/kategori/ekle', $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new ProductCategory($response->body);
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
     * @return ProductCategory
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleKategori($id, $data, $resim = null)
    {
        $files = [];

        if ( ! empty($resim)) {
            $files = [
                'resim' => $resim
            ];
        }

        // response alalım
        $response = $this->api->post('/urun/kategori/guncelle/' . $id, $data, $files);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new ProductCategory($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return ProductCategory
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

            case 200: return new ProductCategory($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param OzellikListeAyar $ayar
     * @return OzellikPagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOzellik(OzellikListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new OzellikPagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun\Ozellik
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getOzellik($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\Ozellik($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Urun\Ozellik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleOzellik($data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\Ozellik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Urun\Ozellik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleOzellik($id, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\Ozellik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun\Ozellik
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silOzellik($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\Ozellik($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @deprecated use listeOzellikGrup
     *
     * @return Urun\OzellikGrup[]
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
                    return new Urun\OzellikGrup($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param OzellikGrupListeAyar $ayar
     * @return Urun\OzellikGrup[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOzellikGrup(OzellikGrupListeAyar $ayar = null)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-grup/liste', is_null($ayar) ? [] : $ayar->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Urun\OzellikGrup($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun\OzellikGrup
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getOzellikGrup($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-grup/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\OzellikGrup($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Urun\OzellikGrup
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleOzellikGrup($data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik-grup/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\OzellikGrup($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Urun\OzellikGrup
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleOzellikGrup($id, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik-grup/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\OzellikGrup($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Urun\OzellikGrup
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silOzellikGrup($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-grup/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun\OzellikGrup($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return OzellikSet[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOzellikSet()
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-set/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new OzellikSet($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return OzellikSet
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getOzellikSet($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-set/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new OzellikSet($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);

        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return OzellikSet
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekleOzellikSet($data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik-set/ekle', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new OzellikSet($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return OzellikSet
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelleOzellikSet($id, $data)
    {
        // response alalım
        $response = $this->api->post('/urun/ozellik-set/guncelle/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new OzellikSet($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return OzellikSet
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silOzellikSet($id)
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-set/sil/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new OzellikSet($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @return OzellikTur[]
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function listeOzellikTur()
    {
        // response alalım
        $response = $this->api->get('/urun/ozellik-tur/liste');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new OzellikTur($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $urunId
     * @return Resim[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function listeResim($urunId)
    {
        // response alalım
        $response = $this->api->get('/urun/resim/liste/' . $urunId);

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
     * @param int $urunId
     * @param string $resim
     * @return Resim
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function ekleResim($urunId, $resim)
    {
        $files = [
            'resim' => $resim
        ];

        // response alalım
        $response = $this->api->post('/urun/resim/ekle/' . $urunId, [], $files);

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
     * @return Urun
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function silResim($id, $resimId)
    {
        // response alalım
        $response = $this->api->get('/urun/resim/sil/' . $id . '/' . $resimId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Urun($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}