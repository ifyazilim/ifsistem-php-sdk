<?php namespace SistemApi\Model;

class EmlakTip
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