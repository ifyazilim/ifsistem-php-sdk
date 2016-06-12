<?php namespace SistemApi\Model\Product;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;
use SistemApi\Model\Resim;

/**
 * @property int id
 * @property string title
 * @property string slug
 * @property int site_id
 * @property int resim_id
 * @property int is_active
 *
 * // diğer
 *
 * @property int urun_adet
 * @property string resim_adresi
 *
 * // model
 *
 * @property Resim resim
 * @property Collection langs
 */
class ProductCategory extends Model
{

}