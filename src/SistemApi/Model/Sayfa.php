<?php namespace SistemApi\Model;

class Sayfa
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $icerik;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->baslik = $item->baslik;
        $this->rbaslik = $item->rbaslik;
        $this->icerik = $item->icerik;
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

    /**
     * @return string
     */
    public function getIcerik()
    {
        return $this->icerik;
    }
}