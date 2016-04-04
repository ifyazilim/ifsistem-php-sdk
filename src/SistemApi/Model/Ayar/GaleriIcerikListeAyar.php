<?php namespace SistemApi\Model\Ayar;

class GaleriIcerikListeAyar
{
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
}