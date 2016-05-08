<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class UrunKategoriListeAyar extends ListeAyar
{
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }
}