<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Resim;

class ResimService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param int $id
     * @return Resim
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function get($id)
    {
        // response alalım
        $response = $this->api->get('/resim/detay/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Resim($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @param string $resim
     * @return Resim
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function ekle($data, $resim)
    {
        // response alalım
        $response = $this->api->post('/resim/ekle', $data, [
            'resim' => $resim
        ]);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Resim($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Resim
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function guncelle($id, $data)
    {
        // response alalım
        $response = $this->api->post('/resim/guncelle/' . $id, $data);

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
}