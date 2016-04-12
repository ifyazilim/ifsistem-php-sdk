<?php namespace SistemApi\Model\Haber;

use Carbon\Carbon;

class Kategori
{
    public $id;
    public $adi;
    public $radi;
    public $site_id;
    public $haber_adet;
    public $created_at;
    public $updated_at;

    // diğer

    public $toplam_alt_kayit;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->radi)) $this->radi = $item->radi;
        if (isset($item->haber_adet)) $this->haber_adet = $item->haber_adet;
        if (isset($item->site_id)) $this->site_id = $item->site_id;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer

        if (isset($item->toplam_alt_kayit)) $this->toplam_alt_kayit = $item->toplam_alt_kayit;
    }
}