<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Urun\Kategori;
use SistemApi\Model\Urun\Ozellik;

/**
 * @property int id
 *
 * @property string adi @deprecated use title
 * @property string radi @deprecated use slug
 * @property string aciklama @deprecated use description
 * @property string title
 * @property string slug
 * @property string description
 *
 * @property string urun_kodu
 * @property int kategori_id
 * @property int site_id
 * @property int ozellik_set_id
 * @property int hit
 * @property int para_birim_id
 * @property float liste_fiyati
 * @property float fiyat
 * @property int kdv_orani
 * @property int is_kdv_dahil
 * @property string status
 *
 * // model
 *
 * @property Kategori kategori
 * @property ParaBirim para_birim
 * @property Collection languages
 * @property Collection|Resim[] resimler
 * @property Collection|Ozellik[] ozellikler
 */
class Urun extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_ACTIVE = 'active';
    const STATUS_PASSIVE = 'passive';
    const STATUS_DELETED = 'deleted';

    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new Kategori($value); break;
            case 'resimler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Resim($item));
                }
                $value = $collection;
                break;
            case 'ozellikler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Ozellik($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}