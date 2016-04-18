<?php namespace SistemApi\Model;

use Carbon\Carbon;

class GaleriIcerik
{
    public $id;
    public $aciklama;
    public $galeri_id;
    public $embed_kodu;
    public $uzanti;
    public $hash;
    public $durum;
    public $created_at;
    public $updated_at;

    // diğer

    public $resim_adresi_orjinal;
    public $resim_adresi_kirpilmis;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->aciklama)) $this->aciklama = $item->aciklama;
        if (isset($item->galeri_id)) $this->galeri_id = $item->galeri_id;
        if (isset($item->embed_kodu)) $this->embed_kodu = $item->embed_kodu;
        if (isset($item->uzanti)) $this->uzanti = $item->uzanti;
        if (isset($item->hash)) $this->hash = $item->hash;
        if (isset($item->durum)) $this->durum = $item->durum;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer

        if (isset($item->resim_adresi_orjinal)) $this->resim_adresi_orjinal = $item->resim_adresi_orjinal;
        if (isset($item->resim_adresi_kirpilmis)) $this->resim_adresi_kirpilmis = $item->resim_adresi_kirpilmis;
    }
}