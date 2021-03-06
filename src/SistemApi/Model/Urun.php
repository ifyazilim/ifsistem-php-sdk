<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Product\ProductCategory;
use SistemApi\Model\Urun\Ozellik;

/**
 * @property int id
 *
 * @property string adi @deprecated use title
 * @property string radi @deprecated use slug
 * @property string aciklama @deprecated use description
 *
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
 *
 * @property int is_new
 * @property int is_active
 * @property int is_deleted
 *
 * // model
 *
 * @property ProductCategory kategori
 * @property ParaBirim para_birim
 * @property Collection languages
 * @property Collection|Resim[] resimler
 * @property Collection|Ozellik[] ozellikler
 * @property Collection|ProductCategory[] categories
 */
class Urun extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new ProductCategory($value); break;
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
            case 'categories':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new ProductCategory($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}