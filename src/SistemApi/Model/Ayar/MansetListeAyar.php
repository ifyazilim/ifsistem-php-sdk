<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class MansetListeAyar extends ListeAyar
{
    /**
     * @deprecated
     *
     * @var array
     */
    private $categoryIds = [];

    /**
     * @deprecated
     *
     * @var string
     */
    private $categoryCode;

    /**
     * @var string[]
     */
    private $categoryCodes;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'category_ids' => $this->categoryIds,
            'category_code' => $this->categoryCode,
            'category_codes' => $this->categoryCodes
        ]);
    }

    /**
     * @return MansetListeAyar
     */
    public function setOrderByRowOrder()
    {
        return $this->setOrderBy('sira');
    }

    /**
     * @deprecated use addCategoryCode
     *
     * @param int $categoryId
     * @return $this
     */
    public function addCategoryId($categoryId)
    {
        $this->categoryIds[] = $categoryId;
        return $this;
    }

    /**
     * @deprecated use setCategoryCodes
     *
     * @param int $categoryIds
     * @return MansetListeAyar
     */
    public function setCategoryIds($categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @deprecated use getCategoryCodes
     *
     * @return int
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * @deprecated use addCategoryCode
     *
     * @param string $categoryCode
     * @return MansetListeAyar
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
        return $this;
    }

    /**
     * @deprecated use getCategoryCodes
     *
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
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
        return $this;
    }

    /**
     * @param \string[] $categoryCodes
     * @return MansetListeAyar
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