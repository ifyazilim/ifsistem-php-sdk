<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string title
 * @property int site_id
 *
 * @property int is_new
 * @property int is_active
 * @property int is_deleted
 *
 * // model
 *
 * @property Collection langs
 * @property Collection|Resim[] images
 */
class Reference extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'images':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Resim($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}