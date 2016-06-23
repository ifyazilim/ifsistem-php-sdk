<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SanatEserListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $kategoriIds;

    /**
     * @var int[]
     */
    private $artistIds = [];

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
     * @return $this
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

    /**
     * @param int $id
     * @return $this
     */
    public function addArtistId($id)
    {
        if ( ! empty($id)) {
            $this->artistIds[] = $id;
            $this->artistIds = array_unique($this->artistIds);
        }
        return $this;
    }

    /**
     * @param \int[] $artistIds
     * @return SanatEserListeAyar
     */
    public function setArtistIds($artistIds)
    {
        $this->artistIds = $artistIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getArtistIds()
    {
        return $this->artistIds;
    }
}