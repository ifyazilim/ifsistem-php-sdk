<?php namespace SistemApi;

use DI\ContainerBuilder;
use SistemApi\Service\ApiService;
use SistemApi\Service\EmlakService;
use SistemApi\Service\GaleriService;
use SistemApi\Service\HaberService;
use SistemApi\Service\IlceService;
use SistemApi\Service\IletisimMesajService;
use SistemApi\Service\KullaniciService;
use SistemApi\Service\MansetService;
use SistemApi\Service\MenuService;
use SistemApi\Service\ReklamService;
use SistemApi\Service\ResimService;
use SistemApi\Service\SanatService;
use SistemApi\Service\SayfaService;
use SistemApi\Service\SehirService;
use SistemApi\Service\SemtService;
use SistemApi\Service\SiparisService;
use SistemApi\Service\SiteService;
use SistemApi\Service\UrunService;

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
 * @property SiteService site
 * @property SehirService sehir
 * @property IlceService ilce
 * @property SemtService semt
 * @property EmlakService emlak
 * @property UrunService urun
 * @property KullaniciService kullanici
 * @property ResimService resim
 * @property ReklamService reklam
 * @property SiparisService siparis
 * @property SanatService sanat
 */
class ApiClient
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param string $token
     * @param string $uri
     */
    public function __construct($token, $uri = 'http://www.ifsistem.com/api/v1')
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
            'site' => \DI\get(SiteService::class),
            'sehir' => \DI\get(SehirService::class),
            'ilce' => \DI\get(IlceService::class),
            'semt' => \DI\get(SemtService::class),
            'emlak' => \DI\get(EmlakService::class),
            'urun' => \DI\get(UrunService::class),
            'kullanici' => \DI\get(KullaniciService::class),
            'resim' => \DI\get(ResimService::class),
            'reklam' => \DI\get(ReklamService::class),
            'siparis' => \DI\get(SiparisService::class),
            'sanat' => \DI\get(SanatService::class),

            'api' => function() use($token, $uri) {
                return new ApiService($token, $uri);
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