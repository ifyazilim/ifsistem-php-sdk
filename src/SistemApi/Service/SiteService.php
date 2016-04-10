<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\SiteAyar;

class SiteService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @return SiteAyar
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getAyar()
    {
        // response alalım
        $response = $this->api->get('/site-ayar');

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200: return new SiteAyar($response->body);
            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}