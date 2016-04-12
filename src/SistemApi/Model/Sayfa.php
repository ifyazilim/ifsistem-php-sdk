<?php namespace SistemApi\Model;

class Sayfa
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $icerik;
    public $kodu;
    public $hit;

    /**
     * @var Kategori
     */
    public $kategori;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->baslik)) $this->baslik = $item->baslik;
        if (isset($item->rbaslik)) $this->rbaslik = $item->rbaslik;
        if (isset($item->icerik)) $this->icerik = $item->icerik;
        if (isset($item->kodu)) $this->kodu = $item->kodu;
        if (isset($item->hit)) $this->hit = $item->hit;

        if (isset($item->kategori)) {
            $this->kategori = new Kategori($item->kategori);
        }
    }

    /**
     * @deprecated use public id property
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @deprecated use public baslik property
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * @deprecated use public rbaslik property
     * @return string
     */
    public function getRbaslik()
    {
        return $this->rbaslik;
    }

    /**
     * @deprecated use public icerik property
     * @return string
     */
    public function getIcerik()
    {
        return $this->icerik;
    }
}