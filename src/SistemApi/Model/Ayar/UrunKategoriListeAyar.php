<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class UrunKategoriListeAyar extends ListeAyar
{
    /**
     * @var int[]
     */
    private $parentIds;

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'parent_ids' => $this->parentIds
        ]);
    }

    /**
     * @deprecated
     *
     * @return ListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }

    /**
     * @param int $parentId
     * @return $this
     */
    public function addParentId($parentId)
    {
        if ( ! is_null($parentId) ) {
            $this->parentIds[] = $parentId;
        }
        return $this;
    }

    /**
     * @param \int[] $parentIds
     * @return UrunKategoriListeAyar
     */
    public function setParentIds($parentIds)
    {
        $this->parentIds = $parentIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getParentIds()
    {
        return $this->parentIds;
    }
}