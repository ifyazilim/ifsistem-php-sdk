<?php namespace SistemApi\Model;

use Carbon\Carbon;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property int site_id
 * @property int resim_id
 * @property string hedef_adres
 * @property Carbon yayin_baslangic_zamani
 * @property Carbon yayin_bitis_zamani
 * @property int is_aktif
 * @property int is_silindi
 *
 * // model
 *
 * @property Resim resim
 */
class Reklam extends Model
{
    protected $dates = [
        'yayin_baslangic_zamani',
        'yayin_bitis_zamani'
    ];
}