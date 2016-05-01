<?php namespace SistemApi\Model\Response;

use SistemApi\Model\EmlakDanisman;
use SistemApi\Model\Response\Base\PagedResponse;

class EmlakDanismanPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, EmlakDanisman::class);
    }

    /**
     * @return EmlakDanisman[]
     */
    public function getEmlakDanismanlar()
    {
        return $this->kayitlar;
    }
}