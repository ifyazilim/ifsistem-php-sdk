<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property string kodu
 * @property int site_id
 * @property int is_aktif
 *
 * @property Collection|Yetki[] yetkiler
 */
class Grup extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'yetkiler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Yetki($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}