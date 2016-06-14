<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class GaleriIcerikListeAyar extends ListeAyar
{
    /**
     * @var int[]
     */
    private $galeriIds;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'galeri_ids' => $this->galeriIds
        ]);
    }

    /**
     * @param int $galeriId
     * @return $this
     */
    public function addGaleriId($galeriId)
    {
        if ($galeriId > 0) {
            $this->galeriIds[] = $galeriId;
            $this->galeriIds = array_unique($this->galeriIds);
        }
        return $this;
    }

    /**
     * @param \int[] $galeriIds
     * @return GaleriIcerikListeAyar
     */
    public function setGaleriIds($galeriIds)
    {
        $this->galeriIds = $galeriIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getGaleriIds()
    {
        return $this->galeriIds;
    }
}