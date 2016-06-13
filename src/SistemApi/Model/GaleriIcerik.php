<?php namespace SistemApi\Model;

use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string aciklama
 * @property string kodu
 * @property int galeri_id
 * @property string embed_kodu
 *
 * // diğer
 *
 * @property string resim_adresi_orjinal
 * @property string resim_adresi_kirpilmis
 *
 * // modeller
 *
 * @property Galeri galeri
 * @property Resim imageOriginal
 * @property Resim imageCropped
 */
class GaleriIcerik extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'imageOriginal':
            case 'imageCropped':
                $value = new Resim($value);
                break;
        }

        parent::__set($key, $value);
    }
}