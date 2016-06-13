<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class UrunKategoriListeAyar extends ListeAyar
{
    /**
     * @var int[]
     */
    private $ids;

    /**
     * @var int[]
     */
    private $parentIds;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'ids' => $this->ids,
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
        $this->parentIds = array_unique($this->parentIds);
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

    /**
     * @param int $id
     * @return $this
     */
    public function addId($id)
    {
        if ($id > 0) {
            $this->ids[] = $id;
        }
        $this->ids = array_unique($this->ids);
        return $this;
    }

    /**
     * @param \int[] $ids
     * @return UrunKategoriListeAyar
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getIds()
    {
        return $this->ids;
    }
}