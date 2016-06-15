<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik
 * @property string rbaslik
 * @property string icerik
 * @property int tip_id
 * @property int kategori_id
 * @property int tur_id
 * @property int ilce_id
 * @property int semt_id
 * @property string adres
 * @property string harita_lat
 * @property string harita_lng
 * @property int danisman_id
 * @property int varsayilan_resim_id
 * @property string fiyat
 * @property string metre_kare
 * @property int oda_sayisi
 * @property int banyo_sayisi
 * @property int bina_yasi
 * @property int kat_sayisi
 * @property int bulundugu_kat
 * @property string aidat
 * @property string isitma
 * @property int is_esyali
 * @property int kullanim_durumu
 * @property int is_site_icerisinde
 * @property int is_krediye_uygun
 * @property int is_takasli
 * @property int is_one_cikan
 *
 * // diğer
 *
 * @property string resim_adresi
 *
 * // modeller
 *
 * @property EmlakTip tip
 * @property EmlakTur tur
 * @property Ilce ilce
 * @property Semt semt
 * @property EmlakDanisman danisman
 * @property Collection|Resim[] resimler
 */
class EmlakIlan extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'tip': $value = new EmlakTip($value); break;
            case 'tur': $value = new EmlakTur($value); break;
            case 'danisman': $value = new EmlakDanisman($value); break;
            case 'resimler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Resim($item));
                }
                $value = $collection;
                break;

        }

        parent::__set($key, $value);
    }

    /**
     * @deprecated
     *
     * @return bool
     */
    public function isResimli()
    {
        return ! empty($this->varsayilan_resim_id);
    }

    /**
     * @deprecated
     *
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