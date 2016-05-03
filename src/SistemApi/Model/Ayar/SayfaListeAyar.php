<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SayfaListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $kategoriId;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriId' => $this->kategoriId
        ]);
    }

    /**
     * @param int $kategoriId
     * @return SayfaListeAyar
     */
    public function setKategoriId($kategoriId)
    {
        $this->kategoriId = $kategoriId;
        return $this;
    }
}