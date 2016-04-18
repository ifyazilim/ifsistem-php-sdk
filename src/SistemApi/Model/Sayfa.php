<?php namespace SistemApi\Model;

use Carbon\Carbon;

class Sayfa
{
    public $id;
    public $baslik;
    public $rbaslik;
    public $icerik;
    public $kodu;
    public $hit;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // modeller

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
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // modeller

        if (isset($item->kategori)) {
            $this->kategori = new Kategori($item->kategori);
        }
    }
}