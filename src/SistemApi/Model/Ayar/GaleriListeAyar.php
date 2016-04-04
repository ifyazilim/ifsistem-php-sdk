<?php namespace SistemApi\Model\Ayar;

class GaleriListeAyar
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
            'turId' => $this->turId,
            'haberId' => $this->haberId,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
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
}