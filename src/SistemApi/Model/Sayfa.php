<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik
 * @property string rbaslik
 * @property string icerik
 * @property string kodu
 * @property int kategori_id
 * @property int hit
 *
 * // diğer modeller
 *
 * @property SayfaKategori kategori
 * @property Collection|Kullanici[] yazarlar
 */
class Sayfa extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new SayfaKategori($value); break;
            case 'yazarlar':
                $collection = new Collection();
                foreach ($value as $id => $item) {
                    $collection->put($id, new Kullanici($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}