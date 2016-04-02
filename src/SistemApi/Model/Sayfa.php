<?php namespace SistemApi\Model;

class Sayfa
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $baslik;

    /**
     * @var string
     */
    private $rbaslik;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->baslik = $item->baslik;
        $this->rbaslik = $item->rbaslik;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * @return string
     */
    public function getRbaslik()
    {
        return $this->rbaslik;
    }
}