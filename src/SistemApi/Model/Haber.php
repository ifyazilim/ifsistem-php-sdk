<?php namespace SistemApi\Model;

use Carbon\Carbon;

class Haber
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $ozet;
    public $icerik;
    public $hit;
    public $site_id;
    public $kategori_id;
    public $haber_lokasyonu;

    /**
     * @var Carbon
     */
    public $haber_zamani;
    public $is_yayinda;
    public $is_haber_saati_gosterilsin;

    public $orjinal_resim_id;
    public $detay_resim_id;
    public $kucuk_resim_id;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // diğer

    public $resim_adresi_orjinal;
    public $resim_adresi_detay;
    public $resim_adresi_kucuk;

    // modeller

    /**
     * @var Kategori
     */
    public $kategori;

    /**
     * @var Galeri[]
     */
    public $galeriler = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->baslik)) $this->baslik = $item->baslik;
        if (isset($item->rbaslik)) $this->rbaslik = $item->rbaslik;
        if (isset($item->ozet)) $this->ozet = $item->ozet;
        if (isset($item->icerik)) $this->icerik = $item->icerik;
        if (isset($item->hit)) $this->hit = $item->hit;
        if (isset($item->site_id)) $this->site_id = $item->site_id;
        if (isset($item->kategori_id)) $this->kategori_id = $item->kategori_id;
        if (isset($item->haber_lokasyonu)) $this->haber_lokasyonu = $item->haber_lokasyonu;
        if (isset($item->haber_zamani)) $this->haber_zamani = Carbon::createFromFormat('Y-m-d H:i:s', $item->haber_zamani);
        if (isset($item->is_yayinda)) $this->is_yayinda = $item->is_yayinda;
        if (isset($item->is_haber_saati_gosterilsin)) $this->is_haber_saati_gosterilsin = $item->is_haber_saati_gosterilsin;

        if (isset($item->orjinal_resim_id)) $this->orjinal_resim_id = $item->orjinal_resim_id;
        if (isset($item->detay_resim_id)) $this->detay_resim_id = $item->detay_resim_id;
        if (isset($item->kucuk_resim_id)) $this->kucuk_resim_id = $item->kucuk_resim_id;

        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer

        if (isset($item->resim_adresi_orjinal)) $this->resim_adresi_orjinal = $item->resim_adresi_orjinal;
        if (isset($item->resim_adresi_detay)) $this->resim_adresi_detay = $item->resim_adresi_detay;
        if (isset($item->resim_adresi_kucuk)) $this->resim_adresi_kucuk = $item->resim_adresi_kucuk;

        // model

        if (isset($item->kategori)) {
            $this->kategori = new Kategori($item->kategori);
        }

        if (isset($item->galeriler)) {
            foreach ($item->galeriler as $galeri) {
                $this->galeriler[] = new Galeri($galeri);
            }
        }
    }
}