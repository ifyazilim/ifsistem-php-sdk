<?php namespace SistemApi\Model;

use Carbon\Carbon;

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
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->radi)) $this->radi = $item->radi;
        if (isset($item->kodu)) $this->kodu = $item->kodu;
        if (isset($item->site_id)) $this->site_id = $item->site_id;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);
    }
}