<?php namespace SistemApi\Model;

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
 */
class Sayfa extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': parent::__set($key, new SayfaKategori($value)); break;
        }

        parent::__set($key, $value);
    }
}