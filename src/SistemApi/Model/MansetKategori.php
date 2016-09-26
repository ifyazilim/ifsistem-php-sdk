<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi
 * @property string kodu
 * @property int site_id
 * @property array ayarlar
 * @property int is_aktif
 * @property Collection dil_metalar
 */
class MansetKategori extends Model
{
    public function getSettingCropperAspectRatioWidth()
    {
        return isset($this->ayarlar->cropper->aspectRatio->width) ?
            $this->ayarlar->cropper->aspectRatio->width :
            850;
    }

    public function getSettingCropperAspectRatioHeight()
    {
        return isset($this->ayarlar->cropper->aspectRatio->height) ?
            $this->ayarlar->cropper->aspectRatio->height :
            350;
    }

    public function getSettingCropperMinCropBoxWidth()
    {
        return isset($this->ayarlar->cropper->minCropBox->width) ?
            $this->ayarlar->cropper->aspectRatio->width :
            850;
    }

    public function getSettingCropperMinCropBoxHeight()
    {
        return isset($this->ayarlar->cropper->minCropBox->height) ?
            $this->ayarlar->cropper->aspectRatio->height :
            350;
    }
}