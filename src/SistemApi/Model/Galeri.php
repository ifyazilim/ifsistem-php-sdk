<?php namespace SistemApi\Model;

use Carbon\Carbon;

class Galeri
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $kodu;
    public $site_id;
    public $haber_id;
    public $tur_id;
    public $varsayilan_icerik_id;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    /**
     * @var GaleriIcerik
     */
    public $varsayilanIcerik;

    /**
     * @var GaleriIcerik[]
     */
    public $icerikler = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->baslik)) $this->baslik = $item->baslik;
        if (isset($item->rbaslik)) $this->rbaslik = $item->rbaslik;
        if (isset($item->kodu)) $this->kodu = $item->kodu;
        if (isset($item->site_id)) $this->site_id = $item->site_id;
        if (isset($item->haber_id)) $this->haber_id = $item->haber_id;
        if (isset($item->tur_id)) $this->tur_id = $item->tur_id;
        if (isset($item->varsayilan_icerik_id)) $this->varsayilan_icerik_id = $item->varsayilan_icerik_id;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        if (isset($item->varsayilanIcerik)) {
            $this->varsayilanIcerik = new GaleriIcerik($item->varsayilanIcerik);
        }

        if (isset($item->icerikler)) {
            foreach ($item->icerikler as $icerik) {
                $this->icerikler[] = new GaleriIcerik($icerik);
            }
        }
    }

    /**
     * @return bool
     */
    public function isResimGalerisi()
    {
        return $this->tur_id == 1;
    }
}