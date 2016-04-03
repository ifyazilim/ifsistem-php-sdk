<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Manset;

class MansetService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
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
        }

        throw new UnknownException($response);
    }
}