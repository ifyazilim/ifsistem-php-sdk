<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SayfaListeAyar extends ListeAyar
{
    /**
     * @deprecated
     *
     * @var int
     */
    private $kategoriId;

    /**
     * @var int
     */
    private $categoryIds = [];

    /**
     * @var string[]
     */
    private $categoryCodes = [];

    /**
     * @var int[]
     */
    private $authorIds = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'kategoriId' => $this->kategoriId,
            'category_ids' => $this->categoryIds,
            'category_codes' => $this->categoryCodes,
            'author_ids' => $this->authorIds
        ]);
    }

    /**
     * @deprecated use addCategoryId
     *
     * @param int $kategoriId
     * @return SayfaListeAyar
     */
    public function setKategoriId($kategoriId)
    {
        $this->kategoriId = $kategoriId;
        return $this;
    }

    /**
     * @deprecated use getCategoryIds
     *
     * @return int
     */
    public function getKategoriId()
    {
        return $this->kategoriId;
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
     * @param \int[] $categoryIds
     * @return SayfaListeAyar
     */
    public function setCategoryIds($categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * @param string $categoryCode
     * @return $this
     */
    public function addCategoryCode($categoryCode)
    {
        $this->categoryCodes[] = $categoryCode;
        return $this;
    }

    /**
     * @param \string[] $categoryCodes
     * @return SayfaListeAyar
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

    /**
     * @param int $id
     * @return $this
     */
    public function addAuthorId($id)
    {
        if ( ! empty($id)) {
            $this->authorIds[] = $id;
            $this->authorIds = array_unique($this->authorIds);
        }
        return $this;
    }

    /**
     * @param \int[] $authorIds
     * @return SayfaListeAyar
     */
    public function setAuthorIds($authorIds)
    {
        $this->authorIds = $authorIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getAuthorIds()
    {
        return $this->authorIds;
    }
}