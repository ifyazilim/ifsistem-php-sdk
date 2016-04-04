<?php namespace SistemApi\Model\Response;

use SistemApi\Model\GaleriIcerik;
use SistemApi\Model\Soyut\ListePagedResponse;

class GaleriIcerikPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, GaleriIcerik::class);
    }

    /**
     * @return GaleriIcerik[]
     */
    public function getGaleriIcerikler()
    {
        return $this->kayitlar;
    }
}