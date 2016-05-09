<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Sehir;

class SehirPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Sehir::class);
    }

    /**
     * @return Sehir[]
     */
    public function getSehirler()
    {
        return $this->kayitlar;
    }
}