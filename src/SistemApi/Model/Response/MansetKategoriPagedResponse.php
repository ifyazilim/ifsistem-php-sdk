<?php namespace SistemApi\Model\Response;

use SistemApi\Model\MansetKategori;
use SistemApi\Model\Response\Base\PagedResponse;

class MansetKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, MansetKategori::class);
    }

    /**
     * @return MansetKategori[]
     */
    public function getMansetKategoriler()
    {
        return $this->kayitlar;
    }
}