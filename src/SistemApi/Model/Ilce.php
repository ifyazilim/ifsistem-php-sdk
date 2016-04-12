<?php namespace SistemApi\Model;

class Ilce
{
    public $id;
    public $adi;

    // modeller

    /**
     * @var Sehir
     */
    public $sehir;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;

        // modeller

        if (isset($item->sehir)) $this->sehir = new Sehir($item->sehir);
    }
}