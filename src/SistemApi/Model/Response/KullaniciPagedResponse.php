<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Kullanici;
use SistemApi\Model\Response\Base\PagedResponse;

class KullaniciPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Kullanici::class);
    }

    /**
     * @return Kullanici[]
     */
    public function getKullanicilar()
    {
        return $this->kayitlar;
    }
}