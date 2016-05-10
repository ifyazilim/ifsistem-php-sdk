<?php namespace SistemApi\Model\Response\Urun;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\UrunSiparis;

class SiparisPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, UrunSiparis::class);
    }

    /**
     * @return UrunSiparis[]
     */
    public function getSiparisler()
    {
        return $this->kayitlar;
    }
}