<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Sayfa;
use SistemApi\Model\Soyut\ListePagedResponse;

class SayfaPagedResponse extends ListePagedResponse
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