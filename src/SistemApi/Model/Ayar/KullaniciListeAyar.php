<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class KullaniciListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $ids = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge([
            'ids' => $this->ids
        ], parent::toArray());
    }

    /**
     * @return ListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addId($id)
    {
        $this->ids[] = $id;
        return $this;
    }
}