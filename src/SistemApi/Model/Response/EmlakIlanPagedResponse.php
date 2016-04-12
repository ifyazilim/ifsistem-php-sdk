<?php namespace SistemApi\Model\Response;

use SistemApi\Model\EmlakIlan;
use SistemApi\Model\Soyut\ListePagedResponse;

class EmlakIlanPagedResponse extends ListePagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, EmlakIlan::class);
    }

    /**
     * @return EmlakIlan[]
     */
    public function getEmlakIlanlar()
    {
        return $this->kayitlar;
    }
}