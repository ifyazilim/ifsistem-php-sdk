<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class EmlakIlanListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $sehirId;

    /**
     * @var int
     */
    private $ilceId;

    /**
     * @var int
     */
    private $semtId;

    /**
     * @var int
     */
    private $tipId;

    /**
     * @var int
     */
    private $turId;

    /**
     * @var int
     */
    private $kategoriId;

    /**
     * @var int
     */
    private $danismanId;

    /**
     * @var array
     */
    private $excludedIds = [];

    /**
     * @var bool
     */
    private $oneCikanOncelikli = false;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'sehirId' => $this->sehirId,
            'ilceId' => $this->ilceId,
            'semtId' => $this->semtId,
            'tipId' => $this->tipId,
            'turId' => $this->turId,
            'kategoriId' => $this->kategoriId,
            'danismanId' => $this->danismanId,
            'excludedIds' => $this->excludedIds,
            'oneCikanOncelikli' => $this->oneCikanOncelikli
        ]);
    }

    /**
     * @param int $danismanId
     * @return EmlakIlanListeAyar
     */
    public function setDanismanId($danismanId)
    {
        $this->danismanId = $danismanId;
        return $this;
    }

    /**
     * @return int
     */
    public function getDanismanId()
    {
        return $this->danismanId;
    }

    /**
     * @param array $excludedId
     * @return EmlakIlanListeAyar
     */
    public function addExcludedId($excludedId)
    {
        $this->excludedIds[] = $excludedId;
        return $this;
    }

    /**
     * @param array $excludedIds
     * @return EmlakIlanListeAyar
     */
    public function setExcludedIds($excludedIds)
    {
        $this->excludedIds = $excludedIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getExcludedIds()
    {
        return $this->excludedIds;
    }

    /**
     * @param boolean $oneCikanOncelikli
     * @return EmlakIlanListeAyar
     */
    public function setOneCikanOncelikli($oneCikanOncelikli)
    {
        $this->oneCikanOncelikli = $oneCikanOncelikli;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isOneCikanOncelikli()
    {
        return $this->oneCikanOncelikli;
    }

    /**
     * @param int $sehirId
     * @return EmlakIlanListeAyar
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

    /**
     * @param int $ilceId
     * @return EmlakIlanListeAyar
     */
    public function setIlceId($ilceId)
    {
        $this->ilceId = $ilceId;
        return $this;
    }

    /**
     * @return int
     */
    public function getIlceId()
    {
        return $this->ilceId;
    }

    /**
     * @param int $semtId
     * @return EmlakIlanListeAyar
     */
    public function setSemtId($semtId)
    {
        $this->semtId = $semtId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSemtId()
    {
        return $this->semtId;
    }

    /**
     * @param int $tipId
     * @return EmlakIlanListeAyar
     */
    public function setTipId($tipId)
    {
        $this->tipId = $tipId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipId()
    {
        return $this->tipId;
    }

    /**
     * @param int $turId
     * @return EmlakIlanListeAyar
     */
    public function setTurId($turId)
    {
        $this->turId = $turId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTurId()
    {
        return $this->turId;
    }

    /**
     * @param int $kategoriId
     * @return EmlakIlanListeAyar
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