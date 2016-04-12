<?php namespace SistemApi\Model;

class EmlakKategori
{
    public $id;
    public $adi;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
    }
}