<?php namespace SistemApi;

use DI\ContainerBuilder;
use SistemApi\Service\ApiService;
use SistemApi\Service\GaleriService;
use SistemApi\Service\HaberService;
use SistemApi\Service\IletisimMesajService;
use SistemApi\Service\MansetService;
use SistemApi\Service\MenuService;
use SistemApi\Service\SayfaService;

/**
 * @property ApiService apiService
 *
 * @property ApiService api
 *
 * @property SayfaService sayfa
 * @property MenuService menu
 * @property MansetService manset
 * @property HaberService haber
 * @property GaleriService galeri
 * @property IletisimMesajService iletisimMesaj
 *
 */
class ApiClient
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $builder = new ContainerBuilder(Container::class);

        $builder->useAnnotations(true);

        $builder->addDefinitions([
            'sayfa' => \DI\get(SayfaService::class),
            'menu' => \DI\get(MenuService::class),
            'manset' => \DI\get(MansetService::class),
            'haber' => \DI\get(HaberService::class),
            'galeri' => \DI\get(GaleriService::class),
            'iletisimMesaj' => \DI\get(IletisimMesajService::class),

            'api' => function() use($token) {
                return new ApiService($token);
            },
            ApiService::class => \DI\get('api')
        ]);

        $this->container = $builder->build();
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }
}