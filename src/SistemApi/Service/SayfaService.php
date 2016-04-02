<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Sayfa;

class SayfaService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param string $kodu
     * @return Sayfa
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getDetayByKodu($kodu)
    {
        // response alalım
        $response = $this->api->get('/sayfa/detay-by-kodu/' . $kodu);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new Sayfa($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}