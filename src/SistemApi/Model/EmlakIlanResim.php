<?php namespace SistemApi\Model;

class EmlakIlanResim
{
    public $resim_adresi;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->resim_adresi)) $this->resim_adresi = $item->resim_adresi;
    }
}