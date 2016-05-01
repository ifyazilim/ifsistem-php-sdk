<?php namespace SistemApi\Model\Response;

use SistemApi\Model\HaberKategori;
use SistemApi\Model\Response\Base\PagedResponse;

class HaberKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, HaberKategori::class);
    }

    /**
     * @return HaberKategori[]
     */
    public function getHaberKategoriler()
    {
        return $this->kayitlar;
    }
}