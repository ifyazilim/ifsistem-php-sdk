<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Urun\Kategori;

/**
 * @property int id
 * @property string adi
 * @property string radi
 * @property string urun_kodu
 * @property string aciklama
 * @property int kategori_id
 * @property int site_id
 * @property int ozellik_set_id
 * @property int hit
 *
 * // model
 *
 * @property Kategori kategori
 * @property Collection|Resim[] resimler
 *
 */
class Urun extends Model
{
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
        }

        parent::__set($key, $value);
    }
}