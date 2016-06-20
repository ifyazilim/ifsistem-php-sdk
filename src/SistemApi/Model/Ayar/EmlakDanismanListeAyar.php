<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class EmlakDanismanListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $isActive;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'is_active' => $this->isActive
        ]);
    }

    /**
     * @deprecated
     *
     * @return EmlakDanismanListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }

    /**
     * @param int $isActive
     * @return EmlakDanismanListeAyar
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}