<?php namespace SistemApi\Model\Ayar\Sanat;

use SistemApi\Model\Ayar\Base\ListeAyar;

class EserListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $kategoriIds;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriIds' => $this->kategoriIds
        ]);
    }

    /**
     * @param int $kategoriId
     * @return $this
     */
    public function addKategoriId($kategoriId)
    {
        $this->kategoriIds[] = $kategoriId;
        return $this;
    }

    /**
     * @param int $kategoriIds
     * @return EserListeAyar
     */
    public function setKategoriIds($kategoriIds)
    {
        $this->kategoriIds = $kategoriIds;
        return $this;
    }

    /**
     * @return int
     */
    public function getKategoriIds()
    {
        return $this->kategoriIds;
    }
}