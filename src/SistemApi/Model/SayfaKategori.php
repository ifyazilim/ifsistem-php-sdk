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
 * @property Collection dil_metalar
 *
 * // modeller
 *
 * @property SayfaKategori ustKategori
 * @property Collection|SayfaKategori[] altKategoriler
 */
class SayfaKategori extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'ustKategori': $value = new SayfaKategori($value); break;
            case 'altKategoriler':
                $values = new Collection();
                foreach ($value as $item) {
                    $values->push(new SayfaKategori($item));
                }
                $value = $values;
                break;
        }

        parent::__set($key, $value);
    }
}