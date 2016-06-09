<?php namespace SistemApi\Model\Urun;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 *
 * // modeller
 *
 * @property Collection|Ozellik[] ozellikler
 */
class OzellikGrup extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
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