<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Urun\Kategori;

class UrunKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Kategori::class);
    }

    /**
     * @deprecated use getKategoriler
     *
     * @return Kategori[]
     */
    public function getUrunKategoriler()
    {
        return $this->getKategoriler();
    }

    /**
     * @return Kategori[]
     */
    public function getKategoriler()
    {
        return $this->kayitlar;
    }
}