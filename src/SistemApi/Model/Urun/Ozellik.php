<?php namespace SistemApi\Model\Urun;

use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property int tur_id
 *
 * // modeller
 *
 * @property OzellikTur tur
 *
 * // ek özellikler
 *
 * @property int pivot_ozellik_grup_id
 * @property string pivot_icerik
 */
class Ozellik extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'tur':
                $value = new OzellikTur($value);
                break;
        }

        parent::__set($key, $value);
    }
}