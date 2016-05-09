<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class IlceListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $sehirId;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'sehirId' => $this->sehirId
        ]);
    }

    /**
     * @return SehirListeAyar
     */
    public function setOrderByAdi()
    {
        return $this->setOrderBy('adi');
    }

    /**
     * @param int $sehirId
     * @return IlceListeAyar
     */
    public function setSehirId($sehirId)
    {
        $this->sehirId = $sehirId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSehirId()
    {
        return $this->sehirId;
    }
}