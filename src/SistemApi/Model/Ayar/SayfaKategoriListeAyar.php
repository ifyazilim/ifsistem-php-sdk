<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class SayfaKategoriListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $parentCategoryCodes = [];

    /**
     * @deprecated
     *
     * @var int
     */
    private $ustKategoriId;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'ustKategoriId' => $this->ustKategoriId,
            'parent_category_codes' => $this->parentCategoryCodes
        ]);
    }

    /**
     * @deprecated
     *
     * @return mixed
     */
    public function getUstKategoriId()
    {
        return $this->ustKategoriId;
    }

    /**
     * @deprecated use addParentCategoryCode
     *
     * @param mixed $ustKategoriId
     * @return $this"
     */
    public function setUstKategoriId($ustKategoriId)
    {
        $this->ustKategoriId = $ustKategoriId;
        return $this;
    }

    /**
     * @param string $categoryCode
     * @return $this
     */
    public function addParentCategoryCode($categoryCode)
    {
        if ( ! is_null($categoryCode)) {
            $this->parentCategoryCodes[] = $categoryCode;
            $this->parentCategoryCodes = array_unique($this->parentCategoryCodes);
        }
        return $this;
    }

    /**
     * @param array $parentCategoryCodes
     * @return SayfaKategoriListeAyar
     */
    public function setParentCategoryCodes($parentCategoryCodes)
    {
        $this->parentCategoryCodes = $parentCategoryCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getParentCategoryCodes()
    {
        return $this->parentCategoryCodes;
    }
}