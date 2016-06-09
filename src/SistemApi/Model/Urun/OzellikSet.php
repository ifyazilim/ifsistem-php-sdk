<?php namespace SistemApi\Model\Urun;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property int site_id
 * @property int sira
 * @property int is_active
 *
 * // modeller
 *
 * @property Collection|OzellikGrup[] gruplar
 */
class OzellikSet extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'gruplar':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new OzellikGrup($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}