<?php namespace SistemApi\Model;

class Kategori
{
    public $id;
    public $adi;
    public $radi;
    public $kodu;
    public $site_id;
    public $created_at;
    public $updated_at;

    /**
     * @param \stdClass $item
     */
    public function __construct($item = null)
    {
        if ( ! is_null($item)) $this->setItem($item);
    }

    /**
     * @param \stdClass $item
     * @return $this
     */
    private function setItem($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->radi)) $this->radi = $item->radi;
        if (isset($item->kodu)) $this->kodu = $item->kodu;
        if (isset($item->site_id)) $this->site_id = $item->site_id;
        if (isset($item->created_at)) $this->created_at = $item->created_at;
        if (isset($item->updated_at)) $this->updated_at = $item->updated_at;
    }
}