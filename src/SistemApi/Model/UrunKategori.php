<?php namespace SistemApi\Model;

use Carbon\Carbon;

class UrunKategori
{
    public $id;
    public $adi;
    public $radi;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // diğer

    public $urun_adet;

    /**
     * @param \stdClass $item
     */
    public function __construct($item = null)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->radi)) $this->radi = $item->radi;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer
        if (isset($item->urun_adet)) $this->urun_adet = $item->urun_adet;
    }
}