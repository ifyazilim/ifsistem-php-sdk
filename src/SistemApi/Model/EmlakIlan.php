<?php namespace SistemApi\Model;

use Carbon\Carbon;

class EmlakIlan
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $icerik;
    public $tip_id;
    public $kategori_id;
    public $tur_id;
    public $ilce_id;
    public $semt_id;
    public $adres;
    public $harita_lat;
    public $harita_lng;
    public $danisman_id;
    public $varsayilan_resim_id;
    public $fiyat;
    public $metre_kare;
    public $oda_sayisi;
    public $banyo_sayisi;
    public $bina_yasi;
    public $kat_sayisi;
    public $bulundugu_kat;
    public $aidat;
    public $isitma;
    public $is_esyali;
    public $kullanim_durumu;
    public $is_site_icerisinde;
    public $is_krediye_uygun;
    public $is_takasli;
    public $is_one_cikan;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // diğer alanlar
    public $resim_adresi;

    // modeller

    /**
     * @var EmlakTip
     */
    public $tip;

    /**
     * @var EmlakTur
     */
    public $tur;

    /**
     * @var Ilce
     */
    public $ilce;

    /**
     * @var Semt
     */
    public $semt;

    /**
     * @var EmlakDanisman
     */
    public $danisman;

    /**
     * @var EmlakIlanResim
     */
    public $resimler = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->baslik)) $this->baslik = $item->baslik;
        if (isset($item->rbaslik)) $this->rbaslik = $item->rbaslik;
        if (isset($item->icerik)) $this->icerik = $item->icerik;
        if (isset($item->tip_id)) $this->tip_id = $item->tip_id;
        if (isset($item->kategori_id)) $this->kategori_id = $item->kategori_id;
        if (isset($item->tur_id)) $this->tur_id = $item->tur_id;
        if (isset($item->ilce_id)) $this->ilce_id = $item->ilce_id;
        if (isset($item->semt_id)) $this->semt_id = $item->semt_id;
        if (isset($item->adres)) $this->adres = $item->adres;
        if (isset($item->harita_lat)) $this->harita_lat = $item->harita_lat;
        if (isset($item->harita_lng)) $this->harita_lng = $item->harita_lng;
        if (isset($item->danisman_id)) $this->danisman_id = $item->danisman_id;
        if (isset($item->varsayilan_resim_id)) $this->varsayilan_resim_id = $item->varsayilan_resim_id;
        if (isset($item->fiyat)) $this->fiyat = $item->fiyat;
        if (isset($item->metre_kare)) $this->metre_kare = $item->metre_kare;
        if (isset($item->oda_sayisi)) $this->oda_sayisi = $item->oda_sayisi;
        if (isset($item->banyo_sayisi)) $this->banyo_sayisi = $item->banyo_sayisi;
        if (isset($item->bina_yasi)) $this->bina_yasi = $item->bina_yasi;
        if (isset($item->kat_sayisi)) $this->kat_sayisi = $item->kat_sayisi;
        if (isset($item->bulundugu_kat)) $this->bulundugu_kat = $item->bulundugu_kat;
        if (isset($item->aidat)) $this->aidat = $item->aidat;
        if (isset($item->isitma)) $this->isitma = $item->isitma;
        if (isset($item->is_esyali)) $this->is_esyali = $item->is_esyali;
        if (isset($item->kullanim_durumu)) $this->kullanim_durumu = $item->kullanim_durumu;
        if (isset($item->is_site_icerisinde)) $this->is_site_icerisinde = $item->is_site_icerisinde;
        if (isset($item->is_krediye_uygun)) $this->is_krediye_uygun = $item->is_krediye_uygun;
        if (isset($item->is_takasli)) $this->is_takasli = $item->is_takasli;
        if (isset($item->is_one_cikan)) $this->is_one_cikan = $item->is_one_cikan;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer alanlar

        if (isset($item->resim_adresi)) $this->resim_adresi = $item->resim_adresi;

        // modeller

        if (isset($item->tip)) $this->tip = new EmlakTip($item->tip);
        if (isset($item->tur)) $this->tur = new EmlakTur($item->tur);
        if (isset($item->ilce)) $this->ilce = new Ilce($item->ilce);
        if (isset($item->semt)) $this->semt = new Semt($item->semt);
        if (isset($item->danisman)) $this->danisman = new EmlakDanisman($item->danisman);

        // resimler
        if (isset($item->resimler)) {
            foreach ($item->resimler as $resimItem) {
                $this->resimler[] = new EmlakIlanResim($resimItem);
            }
        }

    }

    /**
     * @return bool
     */
    public function isResimli()
    {
        return ! empty($this->varsayilan_resim_id);
    }

    /**
     * @return string
     */
    public function getAdresTumu()
    {
        $adres = [];

        // semt boş değilse
        if ( ! empty($this->semt_id))
            $adres[] = $this->semt->adi;

        // ilceyi ekleyelim
        $adres[] = $this->ilce->adi;

        // şehri ekleyelim
        $adres[] = $this->ilce->sehir->adi;

        // geriye dönelim
        return $this->adres . '<br />' . implode(' / ', $adres);
    }
}