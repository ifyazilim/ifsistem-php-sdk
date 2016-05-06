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
     * @param array $args
     */
    public function __construct($args = null)
    {
        // varsayılan bilgiler için
        $args['sayfa'] = isset($args['sayfa']) ? ($args['sayfa'] < 1 ? 1 : $args['sayfa']) : 1;
        $args['adet'] = isset($args['adet']) ? ($args['adet'] < 1 || $args['adet'] > 50 ? 50 : $args['adet']) : 50;
        $args['orderBy'] = isset($args['orderBy']) ? $args['orderBy'] : 'id';
        $args['orderType'] = isset($args['orderType']) ? $args['orderType'] : 'desc';
        $args['dilId'] = isset($args['dilId']) ? $args['dilId'] : 1; // türkçe

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
     * @return int
     */
    public function getSkip()
    {
        return ($this->getSayfa() - 1) * $this->getAdet();
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
     * @return int
     */
    public function getSayfa()
    {
        return empty($this->sayfa) ? 1 : intval($this->sayfa);
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
    public function getAdet()
    {
        if (empty($this->adet)) return 50;
        if ($this->adet > 50) return 50;
        if ($this->adet < 1) return 50;

        return intval($this->adet);
    }

    /**
     * @param int $foundRows
     * @return int
     */
    public function getToplamSayfa($foundRows)
    {
        return intval(ceil($foundRows / $this->getAdet()));
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
     * @param string $orderBy
     * @return ListeAyar
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
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

    /**
     * @return int
     */
    public function getDilId()
    {
        return $this->dilId;
    }
}