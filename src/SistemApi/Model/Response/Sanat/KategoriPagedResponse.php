<?php namespace SistemApi\Model\Response\Sanat;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\SanatKategori;

class KategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, SanatKategori::class);
    }

    /**
     * @return SanatKategori[]
     */
    public function getKategoriler()
    {
        return $this->kayitlar;
    }
}