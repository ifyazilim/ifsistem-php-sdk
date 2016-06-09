<?php namespace SistemApi\Model\Ayar\Urun;

use SistemApi\Model\Ayar\Base\ListeAyar;

class OzellikGrupListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $kategoriIds;

    /**
     * @var bool
     */
    private $onlyUseInProducts = 1;

    /**
     * @var array
     */
    private $attributeSetIds = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriIds' => $this->kategoriIds,
            'onlyUseInProducts' => $this->onlyUseInProducts,
            'attributeSetIds' => $this->attributeSetIds
        ]);
    }

    /**
     * @return OzellikGrupListeAyar
     */
    public function setOrderByAdi()
    {
        return $this->setOrderBy('adi');
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
     * @param int $kategoriIds
     * @return OzellikGrupListeAyar
     */
    public function setKategoriIds($kategoriIds)
    {
        $this->kategoriIds = $kategoriIds;
        return $this;
    }

    /**
     * @return int
     */
    public function getKategoriIds()
    {
        return $this->kategoriIds;
    }

    /**
     * @param int $onlyUseInProducts
     * @return OzellikGrupListeAyar
     */
    public function setOnlyUseInProducts($onlyUseInProducts)
    {
        $this->onlyUseInProducts = $onlyUseInProducts;
        return $this;
    }

    /**
     * @return int
     */
    public function getOnlyUseInProducts()
    {
        return $this->onlyUseInProducts;
    }

    /**
     * @param int $attributeSetId
     * @return $this
     */
    public function addAttributeSetId($attributeSetId)
    {
        $this->attributeSetIds[] = $attributeSetId;
        return $this;
    }

    /**
     * @param array $attributeSetIds
     * @return OzellikGrupListeAyar
     */
    public function setAttributeSetIds($attributeSetIds)
    {
        $this->attributeSetIds = $attributeSetIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributeSetIds()
    {
        return $this->attributeSetIds;
    }
}