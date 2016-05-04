<?php namespace SistemApi\Model\Ayar\Base;

use Illuminate\Support\Str;

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
    private $sayfa = 1;

    /**
     * @var int
     */
    private $adet = 50;

    /**
     * @var int
     */
    private $dilId = 1;

    /**
     * @var int
     */
    private $foundRows;

    /**
     * @param array $args
     */
    public function __construct($args = null)
    {
        // varsayılan bilgiler için
        $args['sayfa'] = isset($argc['sayfa']) ? ($args['sayfa'] < 1 ? 1 : $args['sayfa']) : 1;
        $args['adet'] = isset($argc['adet']) ? ($args['adet'] < 1 || $args['adet'] > 50 ? 50 : $args['adet']) : 50;
        $args['orderBy'] = isset($argc['orderBy']) ? $args['orderBy'] : 'id';
        $args['orderType'] = isset($argc['orderType']) ? $args['orderType'] : 'desc';
        $args['dilId'] = isset($argc['dilId']) ? $args['dilId'] : 1; // türkçe

        foreach ($args as $key => $value) {
            $methodName = 'set' . Str::studly($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    /**
     * @return string
     */
    public function toArray()
    {
        return [
            'orderBy' => $this->orderBy,
            'orderType' => $this->orderType,
            'sayfa' => $this->sayfa,
            'adet' => $this->adet,
            'dilId' => $this->dilId
        ];
    }

    /**
     * @param int $foundRows
     */
    public function setFoundRows($foundRows)
    {
        $this->foundRows = $foundRows;
    }

    /**
     * @return int
     */
    public function getSayfa()
    {
        return empty($this->sayfa) ? 1 : intval($this->sayfa);
    }

    /**
     * @return int
     */
    public function getAdet()
    {
        if (empty($this->adet)) return 50;
        if ($this->adet > 50) return 50;
        if ($this->adet < 1) return 50;

        return intval($this->adet);
    }

    /**
     * @return int
     */
    public function getSkip()
    {
        return ($this->getSayfa() - 1) * $this->getAdet();
    }

    /**
     * @return int
     */
    public function getTake()
    {
        return $this->getAdet();
    }

    /**
     * @return int
     */
    public function getToplamSayfa()
    {
        return intval(ceil($this->getFoundRows() / $this->getAdet()));
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
     * @return int
     */
    public function getFoundRows()
    {
        return intval($this->foundRows);
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

    /**
     * @return string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * @param int $dilId
     * @return ListeAyar
     */
    public function setDilId($dilId)
    {
        $this->dilId = $dilId;
        return $this;
    }
}