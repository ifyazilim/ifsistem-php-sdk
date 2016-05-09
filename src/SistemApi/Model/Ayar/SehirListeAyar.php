<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SehirListeAyar extends ListeAyar
{
    /**
     * @return SehirListeAyar
     */
    public function setOrderByAdi()
    {
        return $this->setOrderBy('adi');
    }
}