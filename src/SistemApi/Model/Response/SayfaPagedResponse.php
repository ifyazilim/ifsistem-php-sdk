<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Response\Base\PagedResponse;
use SistemApi\Model\Sayfa;

class SayfaPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Sayfa::class);
    }

    /**
     * @return Sayfa[]
     */
    public function getSayfalar()
    {
        return $this->kayitlar;
    }
}