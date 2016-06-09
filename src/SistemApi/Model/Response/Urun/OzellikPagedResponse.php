<?php namespace SistemApi\Model\Response\Urun;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Urun\Ozellik;

class OzellikPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Ozellik::class);
    }

    /**
     * @return Ozellik[]
     */
    public function getOzellikler()
    {
        return $this->kayitlar;
    }
}