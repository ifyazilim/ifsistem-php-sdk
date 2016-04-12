<?php namespace SistemApi\Model;

class Sehir
{
    public $id;
    public $adi;
    public $radi;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->radi)) $this->radi = $item->radi;
    }
}