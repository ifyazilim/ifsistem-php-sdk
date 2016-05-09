<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Ilce;
use SistemApi\Model\Response\Base\PagedResponse;

class IlcePagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Ilce::class);
    }

    /**
     * @return Ilce[]
     */
    public function getIlceler()
    {
        return $this->kayitlar;
    }
}