<?php namespace SistemApi\Model\Product;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Resim;

/**
 * @property int id
 *
 * @property string title
 * @property string slug
 *
 * @property int site_id
 * @property int parent_id
 * @property int resim_id
 * @property int code
 * @property int is_active
 *
 * // diğer
 *
 * @property int urun_adet
 * @property string resim_adresi
 *
 * // model
 *
 * @property Resim resim
 * @property ProductCategory parent
 * @property Collection|ProductCategory[] childs
 * @property Collection langs
 */
class ProductCategory extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'parent':
                $value = new ProductCategory($value);
                break;
            case 'childs':
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