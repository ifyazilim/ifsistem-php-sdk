<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class MansetListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $categoryIds = [];

    /**
     * @var string
     */
    private $categoryCode;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'category_ids' => $this->categoryIds,
            'category_code' => $this->categoryCode
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
     * @param int $categoryId
     * @return $this
     */
    public function addCategoryId($categoryId)
    {
        $this->categoryIds[] = $categoryId;
        return $this;
    }

    /**
     * @param int $categoryIds
     * @return MansetListeAyar
     */
    public function setCategoryIds($categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * @param string $categoryCode
     * @return MansetListeAyar
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }
}