<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Reklam;
use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Urun;

class ReklamPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Reklam::class);
    }

    /**
     * @return Reklam[]
     */
    public function getReklamlar()
    {
        return $this->kayitlar;
    }
}