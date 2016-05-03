<?php namespace SistemApi\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik
 * @property string rbaslik
 * @property string ozet
 * @property string icerik
 * @property int hit
 * @property int site_id
 * @property int kategori_id
 * @property string haber_lokasyonu
 * @property Carbon haber_zamani
 * @property Carbon yayin_baslangic_zamani
 * @property int is_yayinda
 * @property int is_haber_saati_gosterilsin
 * @property int kullanici_ekleyen_id
 * @property int hazirlayan_kullanici_id
 *
 * @property int orjinal_resim_id
 * @property int detay_resim_id
 * @property int kucuk_resim_id
 *
 * // diğer
 *
 * @property string resim_adresi_orjinal
 * @property string resim_adresi_detay
 * @property string resim_adresi_kucuk
 *
 * // modeller
 *
 * @property Resim resim_orjinal
 * @property Resim resim_detay
 * @property Resim resim_kucuk
 *
 * @property Kullanici kullanici_ekleyen
 * @property Kullanici kullanici_hazirlayan
 *
 * @property HaberKategori kategori
 * @property Collection|Galeri[] galeriler
 */
class Haber extends Model
{
    protected $dates = [
        'haber_zamani',
        'yayin_baslangic_zamani'
    ];

    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new HaberKategori($value); break;
            case 'resim_orjinal':
            case 'resim_detay':
            case 'resim_kucuk':
                $value = new Resim($value);
                break;
            case 'kullanici_ekleyen':
            case 'kullanici_hazirlayan':
                $value = new Kullanici($value);
                break;
            case 'galeriler':
                $values = new Collection();
                foreach ($value as $item) {
                    $values->push(new Galeri($item));
                }
                $value = $values;
                break;
        }

        parent::__set($key, $value);
    }
}