<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class HaberListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $kategoriId;

    /**
     * @return HaberListeAyar
     */
    public function setOrderByYayinBaslangicZamani()
    {
        return $this->setOrderBy('yayin_baslangic_zamani');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriId' => $this->kategoriId,
        ]);
    }

    /**
     * @param int $kategoriId
     * @return HaberListeAyar
     */
    public function setKategoriId($kategoriId)
    {
        $this->kategoriId = $kategoriId;
        return $this;
    }

    /**
     * @return int
     */
    public function getKategoriId()
    {
        return $this->kategoriId;
    }
}