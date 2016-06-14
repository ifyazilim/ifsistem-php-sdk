<?php namespace SistemApi\Model\Response;

use SistemApi\Model\GaleriIcerik;
use SistemApi\Model\Response\Base\PagedResponse;

class GaleriIcerikPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, GaleriIcerik::class);
    }

    /**
     * @deprecated use getIcerikler
     *
     * @return GaleriIcerik[]
     */
    public function getGaleriIcerikler()
    {
        return $this->getIcerikler();
    }

    /**
     * @return GaleriIcerik[]
     */
    public function getIcerikler()
    {
        return $this->kayitlar;
    }
}