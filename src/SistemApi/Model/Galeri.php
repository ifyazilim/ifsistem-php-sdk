<?php namespace SistemApi\Model;

class Galeri
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $kodu;
    public $site_id;
    public $haber_id;
    public $tur_id;
    public $created_at;
    public $updated_at;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->baslik = $item->baslik;
        $this->rbaslik = $item->rbaslik;
        $this->kodu = $item->kodu;
        $this->site_id = $item->site_id;
        $this->haber_id = $item->haber_id;
        $this->tur_id = $item->tur_id;
        $this->created_at = $item->created_at;
        $this->updated_at = $item->updated_at;
    }
}