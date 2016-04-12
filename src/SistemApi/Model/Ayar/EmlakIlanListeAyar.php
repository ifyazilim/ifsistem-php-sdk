<?php namespace SistemApi\Model\Ayar;

class EmlakIlanListeAyar
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
     * @var int
     */
    private $sayfa;

    /**
     * @var int
     */
    private $adet;

    /**
     * @return string
     */
    public function serialize()
    {
        return json_encode([
            'sehirId' => $this->sehirId,
            'ilceId' => $this->ilceId,
            'semtId' => $this->semtId,
            'tipId' => $this->tipId,
            'turId' => $this->turId,
            'kategoriId' => $this->kategoriId,
            'danismanId' => $this->danismanId,
            'excludedIds' => implode(',', $this->excludedIds),
            'oneCikanOncelikli' => $this->oneCikanOncelikli ? 1 : 0,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
        ]);
    }

    /**
     * @param int $sayfa
     * @return $this
     */
    public function setSayfa($sayfa)
    {
        $this->sayfa = $sayfa;
        return $this;
    }

    /**
     * @param int $adet
     * @return $this
     */
    public function setAdet($adet)
    {
        $this->adet = $adet;
        return $this;
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
     * @param array $excludedId
     * @return EmlakIlanListeAyar
     */
    public function addExcludedId($excludedId)
    {
        $this->excludedIds[] = $excludedId;
        return $this;
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
     * @param int $sehirId
     * @return EmlakIlanListeAyar
     */
    public function setSehirId($sehirId)
    {
        $this->sehirId = $sehirId;
        return $this;
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
     * @param int $semtId
     * @return EmlakIlanListeAyar
     */
    public function setSemtId($semtId)
    {
        $this->semtId = $semtId;
        return $this;
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
     * @param int $turId
     * @return EmlakIlanListeAyar
     */
    public function setTurId($turId)
    {
        $this->turId = $turId;
        return $this;
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
}