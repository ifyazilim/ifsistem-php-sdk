<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property string mail
 * @property int site_id
 * @property int is_yonetici
 * @property string unvan
 * @property string meslek
 * @property string telefon_sabit
 * @property string telefon_cep
 * @property string adres_is
 * @property string adres_ev
 * @property string sosyal_facebook
 * @property string sosyal_twitter
 * @property string sosyal_linkedin
 * @property string sosyal_instagram
 * @property string biyografi
 *
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
 * @property Collection|Grup[] gruplar
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
            case 'gruplar':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new Grup($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }
}