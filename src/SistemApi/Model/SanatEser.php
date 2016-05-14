<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property int site_id
 * @property int kategori_id
 * @property int resim_id
 * @property int hit
 * @property int is_aktif
 *
 * // diğer modeller
 *
 * @property SanatKategori kategori
 * @property Resim resim
 * @property Collection|Kullanici[] sanatcilar
 */
class SanatEser extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new SanatKategori($value); break;
            case 'sanatcilar':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Kullanici($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}