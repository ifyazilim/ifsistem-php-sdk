<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\SayfaKategori;

class SayfaKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, SayfaKategori::class);
    }

    /**
     * @return SayfaKategori[]
     */
    public function getSayfaKategoriler()
    {
        return $this->kayitlar;
    }
}