<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Siparis;

class SiparisPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Siparis::class);
    }

    /**
     * @return Siparis[]
     */
    public function getSiparisler()
    {
        return $this->kayitlar;
    }
}