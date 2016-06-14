<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Resim;

class ImageService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param array $data
     * @param string $image
     * @return Resim
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     * @throws InternalApiErrorException
     */
    public function createImage($data, $image)
    {
        // response alalım
        $response = $this->api->post('/image/create', $data, [
            'image' => $image
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
    public function updateImage($id, $data)
    {
        // response alalım
        $response = $this->api->post('/image/update/' . $id, $data);

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