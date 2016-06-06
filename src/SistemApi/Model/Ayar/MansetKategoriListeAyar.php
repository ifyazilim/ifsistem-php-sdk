<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class MansetKategoriListeAyar extends ListeAyar
{
    /**
     * @deprecated artık kullanılmıyacak
     *
     * @return ListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }
}