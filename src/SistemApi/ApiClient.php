<?php namespace SistemApi;

use DI\ContainerBuilder;
use SistemApi\Service\ApiService;
use SistemApi\Service\SayfaService;
use function DI\get;
use function DI\object;

/**
 * @property ApiService apiService
 *
 * @property ApiService api
 * @property SayfaService sayfa
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
            'sayfa' => object(SayfaService::class),
            'api' => object(ApiService::class)->constructor($token),

            ApiService::class => get('api')

        ]);

        $this->container = $builder->build();
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }
}