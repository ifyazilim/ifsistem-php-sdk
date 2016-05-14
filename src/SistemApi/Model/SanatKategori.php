<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property int ust_id
 * @property string adi
 * @property string radi
 * @property string kodu
 * @property int site_id
 * @property int is_aktif
 * @property Collection dil_metalar
 *
 * // modeller
 *
 * @property SanatKategori ustKategori
 * @property Collection|SanatKategori[] altKategoriler
 */
class SanatKategori extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'ustKategori': $value = new SanatKategori($value); break;
            case 'altKategoriler':
                $values = new Collection();
                foreach ($value as $item) {
                    $values->push(new SanatKategori($item));
                }
                $value = $values;
                break;
        }

        parent::__set($key, $value);
    }
}