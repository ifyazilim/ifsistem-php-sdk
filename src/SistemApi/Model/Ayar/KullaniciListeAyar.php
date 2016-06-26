<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class KullaniciListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $ids = [];

    /**
     * @deprecated
     *
     * @var string
     */
    private $grupKodu;

    /**
     * @var int
     */
    private $hasArt;

    /**
     * @var int
     */
    private $hasPage;

    /**
     * @var array
     */
    private $groupCodes = [];

    /**
     * @var array
     */
    private $pageCategoryCodes = [];

    /**
     * @var array
     */
    private $artCategoryCodes = [];

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'ids' => $this->ids,
            'grupKodu' => $this->grupKodu,
            'has_art' => $this->hasArt,
            'has_page' => $this->hasPage,
            'group_codes' => $this->groupCodes,
            'page_category_codes' => $this->pageCategoryCodes,
            'art_category_codes' => $this->artCategoryCodes
        ]);
    }

    /**
     * @return KullaniciListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addId($id)
    {
        $this->ids[] = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param array $ids
     * @return KullaniciListeAyar
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * @deprecated use addGroupCode
     *
     * @param string $grupKodu
     * @return KullaniciListeAyar
     */
    public function setGrupKodu($grupKodu)
    {
        $this->grupKodu = $grupKodu;
        return $this;
    }

    /**
     * @deprecated
     * @return string
     */
    public function getGrupKodu()
    {
        return $this->grupKodu;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function addGroupCode($code)
    {
        if ( ! is_null($code)) {
            $this->groupCodes[] = $code;
            $this->groupCodes = array_unique($this->groupCodes);
        }
        return $this;
    }

    /**
     * @param array $groupCodes
     * @return KullaniciListeAyar
     */
    public function setGroupCodes($groupCodes)
    {
        $this->groupCodes = $groupCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getGroupCodes()
    {
        return $this->groupCodes;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function addPageCategoryCode($code)
    {
        if ( ! is_null($code)) {
            $this->pageCategoryCodes[] = $code;
            $this->pageCategoryCodes = array_unique($this->pageCategoryCodes);
        }
        return $this;
    }

    /**
     * @param array $pageCategoryCodes
     * @return KullaniciListeAyar
     */
    public function setPageCategoryCodes($pageCategoryCodes)
    {
        $this->pageCategoryCodes = $pageCategoryCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getPageCategoryCodes()
    {
        return $this->pageCategoryCodes;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function addArtCategoryCode($code)
    {
        if ( ! is_null($code)) {
            $this->artCategoryCodes[] = $code;
            $this->artCategoryCodes = array_unique($this->artCategoryCodes);
        }
        return $this;
    }

    /**
     * @param array $artCategoryCodes
     * @return KullaniciListeAyar
     */
    public function setArtCategoryCodes($artCategoryCodes)
    {
        $this->artCategoryCodes = $artCategoryCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getArtCategoryCodes()
    {
        return $this->artCategoryCodes;
    }

    /**
     * @param int $hasArt
     * @return KullaniciListeAyar
     */
    public function setHasArt($hasArt)
    {
        $this->hasArt = $hasArt;
        return $this;
    }

    /**
     * @return int
     */
    public function getHasArt()
    {
        return $this->hasArt;
    }

    /**
     * @param int $hasPage
     * @return KullaniciListeAyar
     */
    public function setHasPage($hasPage)
    {
        $this->hasPage = $hasPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getHasPage()
    {
        return $this->hasPage;
    }
}