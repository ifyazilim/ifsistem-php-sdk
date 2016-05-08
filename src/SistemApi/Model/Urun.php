<?php namespace SistemApi\Model;

use SistemApi\Model\Base\Model;

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
 * @property UrunKategori kategori
 *
 */
class Urun extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'kategori': $value = new UrunKategori($value); break;
        }

        parent::__set($key, $value);
    }
}