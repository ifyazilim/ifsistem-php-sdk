<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Galeri;
use SistemApi\Model\Soyut\ListePagedResponse;

class GaleriPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Galeri::class);
    }

    /**
     * @return Galeri[]
     */
    public function getGaleriler()
    {
        return $this->kayitlar;
    }
}