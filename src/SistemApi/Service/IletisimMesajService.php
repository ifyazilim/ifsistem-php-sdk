<?php namespace SistemApi\Service;

use SistemApi\Exception\BadRequestException;
use SistemApi\Exception\InternalApiErrorException;
use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\IletisimMesaj;

class IletisimMesajService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @deprecated use ekle
     *
     * @param IletisimMesaj $iletisimMesaj
     * @return string
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws BadRequestException
     */
    public function yeni(IletisimMesaj $iletisimMesaj)
    {
        return $this->ekle($iletisimMesaj);
    }

    /**
     * @param IletisimMesaj $iletisimMesaj
     * @return string
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws BadRequestException
     */
    public function ekle(IletisimMesaj $iletisimMesaj)
    {
        // response alalım
        $response = $this->api->post('/iletisim-mesaj/yeni', [
            'adi' => $iletisimMesaj->adi,
            'mail' => $iletisimMesaj->mail,
            'telefon' => $iletisimMesaj->telefon,
            'konu' => $iletisimMesaj->konu,
            'mesaj' => $iletisimMesaj->mesaj
        ]);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return $response->body->mesaj;
            case 400: throw new BadRequestException($response);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
            case 500: throw new InternalApiErrorException($response);
        }

        throw new UnknownException($response);
    }
}