<?php namespace SistemApi\Model;

class SiteAyar
{
    public $adi;
    public $meta_baslik;
    public $meta_aciklama;
    public $meta_arama;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->adi = $item->adi;
        $this->meta_baslik = $item->meta_baslik;
        $this->meta_aciklama = $item->meta_aciklama;
        $this->meta_arama = $item->meta_arama;
    }
}