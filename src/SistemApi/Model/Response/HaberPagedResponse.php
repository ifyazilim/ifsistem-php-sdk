<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Haber;
use SistemApi\Model\Soyut\ListePagedResponse;

class HaberPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Haber::class);
    }

    /**
     * @return Haber[]
     */
    public function getHaberler()
    {
        return $this->kayitlar;
    }
}