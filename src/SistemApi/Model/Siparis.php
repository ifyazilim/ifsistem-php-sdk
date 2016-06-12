<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Siparis\SiparisAdres;
use SistemApi\Model\Siparis\SiparisUrun;
use SistemApi\Model\Urun\KargoYontem;
use SistemApi\Model\Urun\OdemeYontem;

/**
 * @property int id
 * @property int site_id
 * @property int kullanici_id
 * @property int para_birim_id
 * @property int toplam_tutar
 * @property int durum_id
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
 * @property string telefon
 * @property string status
 *
 * // model
 *
 * @property Kullanici kullanici
 * @property ParaBirim para_birim
 * @property OdemeYontem odeme_yontem_bilgi_model
 * @property KargoYontem kargo_yontem_bilgi_model
 * @property SiparisAdres fatura_adres_bilgi_model
 * @property SiparisAdres teslimat_adres_bilgi_model
 * @property SiparisAdres fatura_adres
 * @property SiparisAdres teslimat_adres
 * @property Collection|SiparisUrun[] urunler
 */
class Siparis extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_ACTIVE = 'active';
    const STATUS_PASSIVE = 'passive';
    const STATUS_DELETED = 'deleted';

    public function __set($key, $value)
    {
        switch ($key) {
            case 'odeme_yontem_bilgi_model': $value = new OdemeYontem($value); break;
            case 'kargo_yontem_bilgi_model': $value = new KargoYontem($value); break;
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