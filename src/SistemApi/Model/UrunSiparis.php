<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Siparis\SiparisAdres;
use SistemApi\Model\Siparis\SiparisKargoYontem;
use SistemApi\Model\Siparis\SiparisOdemeYontem;
use SistemApi\Model\Siparis\SiparisUrun;

/**
 * @deprecated use Siparis
 *
 * @property int id
 * @property int site_id
 * @property int kullanici_id
 * @property int para_birim_id
 * @property int toplam_tutar
 * @property int durum
 *
 * @property int odeme_yontem_id
 * @property string odeme_yontem_bilgi
 * @property int odeme_yontem_bedel
 *
 * @property int kargo_yontem_id
 * @property string kargo_yontem_bilgi
 * @property int kargo_yontem_bedel
 *
 * @property int fatura_adres_id
 * @property string fatura_adres_bilgi
 *
 * @property int teslimat_adres_id
 * @property string teslimat_adres_bilgi
 *
 * // model
 *
 * @property Kullanici kullanici
 * @property ParaBirim para_birim
 * @property SiparisOdemeYontem odeme_yontem_bilgi_model
 * @property SiparisKargoYontem kargo_yontem_bilgi_model
 * @property SiparisAdres fatura_adres_bilgi_model
 * @property SiparisAdres teslimat_adres_bilgi_model
 * @property SiparisAdres fatura_adres
 * @property SiparisAdres teslimat_adres
 * @property Collection|SiparisUrun[] urunler
 */
class UrunSiparis extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'odeme_yontem_bilgi_model': $value = new SiparisOdemeYontem($value); break;
            case 'kargo_yontem_bilgi_model': $value = new SiparisKargoYontem($value); break;
            case 'fatura_adres_bilgi_model': $value = new SiparisAdres($value); break;
            case 'teslimat_adres_bilgi_model': $value = new SiparisAdres($value); break;
            case 'fatura_adres': $value = new SiparisAdres($value); break;
            case 'teslimat_adres': $value = new SiparisAdres($value); break;
            case 'urunler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new SiparisUrun($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}