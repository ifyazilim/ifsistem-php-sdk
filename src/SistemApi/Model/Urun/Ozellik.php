<?php namespace SistemApi\Model\Urun;

use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 *
 * // modeller
 *
 * @property OzellikTur tur
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