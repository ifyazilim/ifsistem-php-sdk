<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SiparisListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $durumIds = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'durumIds' => $this->durumIds
        ]);
    }

    /**
     * @param array $durumIds
     * @return SiparisListeAyar
     */
    public function setDurumIds($durumIds)
    {
        $this->durumIds = $durumIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getDurumIds()
    {
        return $this->durumIds;
    }

    /**
     * @param int $durumId
     * @return $this
     */
    public function addDurumId($durumId)
    {
        $this->durumIds[] = $durumId;
        return $this;
    }
}