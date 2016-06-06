<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Manset;
use SistemApi\Model\Response\Base\PagedResponse;

class MansetPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Manset::class);
    }

    /**
     * @return Manset[]
     */
    public function getMansetler()
    {
        return $this->kayitlar;
    }
}