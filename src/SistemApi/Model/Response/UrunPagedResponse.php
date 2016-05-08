<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Urun;

class UrunPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Urun::class);
    }

    /**
     * @return Urun[]
     */
    public function getUrunler()
    {
        return $this->kayitlar;
    }
}