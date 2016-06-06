<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string baslik @deprecated use title
 * @property string title
 * @property string link
 * @property int category_id
 *
 * // diğer
 *
 * @property string resim_adresi @deprecated use image_original_url
 * @property string image_original_url
 * @property string image_cropped_url
 * @property Collection languages
 *
 * // model
 *
 * @property MansetKategori category
 * @property Resim resim @deprecated use image_original
 * @property Resim image_original
 * @property Resim image_cropped
 */
class Manset extends Model
{
    public function __set($key, $value)
    {
        switch ($key) {
            case 'image_original':
            case 'image_cropped':
                $value = new Resim($value);
                break;
            case 'category':
                $value = new MansetKategori($value);
                break;
        }

        parent::__set($key, $value);
    }
}