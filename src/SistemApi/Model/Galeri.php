<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik
 * @property string rbaslik
 * @property string kodu
 * @property int site_id
 * @property int tur_id
 * @property int varsayilan_icerik_id
 *
 * // modeller
 *
 * @property GaleriIcerik varsayilanIcerik
 * @property Collection|GaleriIcerik[] icerikler
 */
class Galeri extends Model
{
    const TUR_RESIM = 1;
    const TUR_VIDEO = 2;

    public function __set($key, $value)
    {
        switch ($key) {
            case 'varsayilanIcerik':
                $value = new GaleriIcerik($value);
                break;
            case 'icerikler':
                $collection = new Collection();
                foreach ($value as $item) {
                    $collection->push(new GaleriIcerik($item));
                }
                $value = $collection;
                break;
        }

        parent::__set($key, $value);
    }

    /**
     * @deprecated use tur_id
     *
     * @return bool
     */
    public function isResimGalerisi()
    {
        return $this->tur_id == 1;
    }
}