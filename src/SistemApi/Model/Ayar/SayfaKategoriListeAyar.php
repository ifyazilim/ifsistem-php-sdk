<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SayfaKategoriListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $ustKategoriId;

    /**
     * @return ListeAyar
     */
    public function setOrderByAdi()
    {
        parent::setOrderBy('adi');
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'ustKategoriId' => $this->ustKategoriId
        ]);
    }

    /**
     * @return mixed
     */
    public function getUstKategoriId()
    {
        return $this->ustKategoriId;
    }

    /**
     * @param mixed $ustKategoriId
     * @return $this"
     */
    public function setUstKategoriId($ustKategoriId)
    {
        $this->ustKategoriId = $ustKategoriId;
        return $this;
    }
}