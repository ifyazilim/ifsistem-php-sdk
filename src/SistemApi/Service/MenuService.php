<?php namespace SistemApi\Service;

use SistemApi\Exception\NotFoundException;
use SistemApi\Exception\UnauthorizedException;
use SistemApi\Exception\UnknownException;
use SistemApi\Model\Menu\Eleman;

class MenuService
{
    /**
     * @Inject
     * @var ApiService
     */
    private $api;

    /**
     * @param string $menuKodu
     * @return Eleman[]
     *
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function getElemanListeByMenuKodu($menuKodu)
    {
        // response alalım
        $response = $this->api->get('/menu/eleman/liste-by-menu-kodu/' . $menuKodu);

        // durum koduna göre işlem yapalım
        switch ($response->code) {

            case 200:

                return array_map(function($item) {
                    return new Eleman($item);
                }, $response->body);

            case 401: throw new UnauthorizedException($response->body->mesaj);
            case 404: throw new NotFoundException($response->body->mesaj);
        }

        throw new UnknownException($response);
    }
}