<?php namespace SistemApi\Model\Ayar\Base;

abstract class ListeAyar
{
    /**
     * @var string
     */
    private $orderBy = 'id';

    /**
     * @var string
     */
    private $orderType = 'desc';

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
    public function toArray()
    {
        return [
            'orderBy' => $this->orderBy,
            'orderType' => $this->orderType,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet
        ];
    }

    /**
     * @return $this
     */
    public function setOrderById()
    {
        $this->orderBy = 'id';
        return $this;
    }

    /**
     * @return $this
     */
    public function setOrderTypeAsc()
    {
        $this->orderType = 'asc';
        return $this;
    }

    /**
     * @return $this
     */
    public function setOrderTypeDesc()
    {
        $this->orderType = 'desc';
        return $this;
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

    /**
     * @param string $orderBy
     * @return ListeAyar
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @param string $orderType
     * @return ListeAyar
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;
        return $this;
    }
}