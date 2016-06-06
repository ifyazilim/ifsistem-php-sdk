<?php namespace SistemApi\Model;

use Illuminate\Support\Collection;
use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property string adi @deprecated
 * @property string title
 * @property string kodu @deprecated
 * @property string code
 * @property int site_id
 * @property array settings
 * @property int is_active
 * @property Collection languages
 */
class MansetKategori extends Model
{
    public function getSettingCropperAspectRatioWidth()
    {
        return isset($this->settings->cropper->aspectRatio->width) ?
            $this->settings->cropper->aspectRatio->width :
            850;
    }

    public function getSettingCropperAspectRatioHeight()
    {
        return isset($this->settings->cropper->aspectRatio->height) ?
            $this->settings->cropper->aspectRatio->height :
            850;
    }

    public function getSettingCropperMinCropBoxWidth()
    {
        return isset($this->settings->cropper->minCropBox->width) ?
            $this->settings->cropper->aspectRatio->width :
            850;
    }

    public function getSettingCropperMinCropBoxHeight()
    {
        return isset($this->settings->cropper->minCropBox->height) ?
            $this->settings->cropper->aspectRatio->height :
            850;
    }
}