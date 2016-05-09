<?php namespace SistemApi\Model;

use SistemApi\Model\Base\Model;

/**
 * @property int id
 * @property int site_id
 * @property int kullanici_id
 * @property int para_birim_id
 * @property int toplam_tutar
 * @property int durum
 *
 * @property int odeme_yontem_id
 * @property int odeme_yontem_bilgi
 * @property int odeme_yontem_bedel
 *
 * @property int kargo_yontem_id
 * @property int kargo_yontem_bilgi
 * @property int kargo_yontem_bedel
 *
 * @property int fatura_adres_id
 * @property int fatura_adres_bilgi
 *
 * @property int teslimat_adres_id
 * @property int teslimat_adres_bilgi
 */
class UrunSiparis extends Model
{
    const DURUM_SEPET = 1;
    const DURUM_ISLENIYOR = 2;
}