<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik
 * @property string link
 * @property int kategori_id
 *
 * // diğer
 *
 * @property string resim_orjinal_url
 * @property string resim_kirpilmis_url
 * @property Collection dil_metalar
 *
 * // model
 *
 * @property MansetKategori kategori
 * @property Resim resim_orjinal
 * @property Resim resim_kirpilmis
 */
class Manset extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'resim_orjinal':
            case 'resim_kirpilmis':
                $value = new Resim($value);
                break;
            case 'kategori':
                $value = new MansetKategori($value);
                break;
        }

        parent::__set($key, $value);
    }
}