<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\UrunKategori;

class UrunKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, UrunKategori::class);
    }

    /**
     * @return UrunKategori[]
     */
    public function getUrunKategoriler()
    {
        return $this->kayitlar;
    }
}