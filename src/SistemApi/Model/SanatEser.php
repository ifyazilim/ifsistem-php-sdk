<?php namespace SistemApi\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property int site_id
 * @property string baslik
 * @property string rbaslik
 * @property string icerik
 * @property int kategori_id
 * @property int resim_id
 * @property int hit
 * @property Carbon eser_zamani
 * @property Carbon yayin_zamani
 * @property int is_aktif
 * @property Collection dil_metalar
 *
 * // diğer modeller
 *
 * @property SanatKategori kategori
 * @property Resim resim
 * @property Collection|Kullanici[] sanatcilar
 */
class SanatEser extends Model
{
    protected $dates = [
        'eser_zamani',
        'yayin_zamani'
    ];

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