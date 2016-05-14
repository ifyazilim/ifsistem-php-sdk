<?php namespace SistemApi\Model\Response\Sanat;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\SanatEser;

class EserPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, SanatEser::class);
    }

    /**
     * @return SanatEser[]
     */
    public function getEserler()
    {
        return $this->kayitlar;
    }
}