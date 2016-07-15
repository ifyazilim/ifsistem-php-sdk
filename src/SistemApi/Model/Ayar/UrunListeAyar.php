<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class UrunListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $kategoriIds = [];

    /**
     * @var array
     */
    private $ozellikGrupIds = [];

    /**
     * @var array
     */
    private $ozellikIds = [];

    /**
     * @var string[]
     */
    private $categoryCodes = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriIds' => $this->kategoriIds,
            'ozellikGrupIds' => $this->ozellikGrupIds,
            'ozellikIds' => $this->ozellikIds,
            'category_codes' => $this->categoryCodes
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
     * @param array $kategoriIds
     * @return UrunListeAyar
     */
    public function setKategoriIds($kategoriIds)
    {
        $this->kategoriIds = $kategoriIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getKategoriIds()
    {
        return $this->kategoriIds;
    }

    /**
     * @param int $ozellikGrupId
     * @return $this
     */
    public function addOzellikGrupId($ozellikGrupId)
    {
        $this->ozellikGrupIds[] = $ozellikGrupId;
        return $this;
    }

    /**
     * @param array $ozellikGrupIds
     * @return UrunListeAyar
     */
    public function setOzellikGrupIds($ozellikGrupIds)
    {
        $this->ozellikGrupIds = $ozellikGrupIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getOzellikGrupIds()
    {
        return $this->ozellikGrupIds;
    }

    /**
     * @param int $ozellikId
     * @return $this
     */
    public function addOzellikId($ozellikId)
    {
        $this->ozellikIds[] = $ozellikId;
        return $this;
    }

    /**
     * @param array $ozellikIds
     * @return UrunListeAyar
     */
    public function setOzellikIds($ozellikIds)
    {
        $this->ozellikIds = $ozellikIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getOzellikIds()
    {
        return $this->ozellikIds;
    }

    /**
     * @param string $categoryCode
     * @return $this
     */
    public function addCategoryCode($categoryCode)
    {
        if ( ! is_null($categoryCode)) {
            $this->categoryCodes[] = $categoryCode;
        }
        $this->categoryCodes = array_unique($this->categoryCodes);
        return $this;
    }

    /**
     * @param \string[] $categoryCodes
     * @return UrunListeAyar
     */
    public function setCategoryCodes($categoryCodes)
    {
        $this->categoryCodes = $categoryCodes;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getCategoryCodes()
    {
        return $this->categoryCodes;
    }


}