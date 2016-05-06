<?php namespace SistemApi\Model;

use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property string mail
 * @property int site_id
 * @property string unvan
 * @property int orjinal_resim_id
 * @property int kirpilmis_resim_id
 *
 * // diğer
 *
 * @property string resim_adresi_orjinal
 * @property string resim_adresi_kirpilmis
 *
 * @property Resim resim_orjinal
 * @property Resim resim_kirpilmis
 */
class Kullanici extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'resim_orjinal':
            case 'resim_kirpilmis':
                $value = new Resim($value);
                break;
        }

        parent::__set($key, $value);
    }
}