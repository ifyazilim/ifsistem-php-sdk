<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Ayar\ReferenceListConfig;
use SistemApi\Model\Reference;
use SistemApi\Model\Resim;
use SistemApi\Model\Response\ReferencePagedResponse;

class ReferenceService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param ReferenceListConfig $config
     * @return ReferencePagedResponse
     *
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function getReferences(ReferenceListConfig $config = null)
    {
        // response alalım
        $response = $this->api->get('/reference/list', is_null($config) ? [] : $config->toArray());

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new ReferencePagedResponse($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Reference
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getReference($id)
    {
        // response alalım
        $response = $this->api->get('/reference/get/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Reference($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param array $data
     * @return Reference
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws UnknownException
     */
    public function createReference($data = [])
    {
        // response alalım
        $response = $this->api->post('/reference/create', $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Reference($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Reference
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function updateReference($id, $data)
    {
        // response alalım
        $response = $this->api->post('/reference/update/' . $id, $data);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Reference($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $id
     * @return Reference
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function deleteReference($id)
    {
        // response alalım
        $response = $this->api->get('/reference/delete/' . $id);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Reference($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }

    /**
     * @param int $referenceId
     * @param string $image
     * @return Resim
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function createImage($referenceId, $image)
    {
        $files = [
            'image' => $image
        ];

        // response alalım
        $response = $this->api->post('/reference/image/create/' . $referenceId, [], $files);

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
     * @param int $referenceId
     * @param int $imageId
     * @return Reference
     *
     * @throws BadRequestException
     * @throws UnauthorizedException
     * @throws NotFoundException
     * @throws UnknownException
     */
    public function deleteImage($referenceId, $imageId)
    {
        // response alalım
        $response = $this->api->get('/reference/image/delete/' . $referenceId . '/' . $imageId);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Reference($response->body);
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}