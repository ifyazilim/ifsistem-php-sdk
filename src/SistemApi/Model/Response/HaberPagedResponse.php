<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Haber;
use SistemApi\Model\Response\Base\PagedResponse;

class HaberPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Haber::class);
    }

    /**
     * @return Haber[]
     */
    public function getHaberler()
    {
        return $this->kayitlar;
    }
}