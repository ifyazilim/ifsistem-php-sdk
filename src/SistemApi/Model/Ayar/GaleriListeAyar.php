<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class GaleriListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $turId;

    /**
     * @var int
     */
    private $haberId;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'turId' => $this->turId,
            'haberId' => $this->haberId
        ]);
    }

    /**
     * @param int $turId
     * @return GaleriListeAyar
     */
    public function setTurId($turId)
    {
        $this->turId = $turId;
        return $this;
    }

    /**
     * @param int $haberId
     * @return GaleriListeAyar
     */
    public function setHaberId($haberId)
    {
        $this->haberId = $haberId;
        return $this;
    }
}