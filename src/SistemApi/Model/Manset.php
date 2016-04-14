<?php namespace SistemApi\Model;

use Carbon\Carbon;

class Manset
{
    public $id;
    public $baslik;
    public $link;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // diğer

    public $resim_adresi;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->baslik)) $this->baslik = $item->baslik;
        if (isset($item->link)) $this->link = $item->link;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer

        if (isset($item->resim_adresi)) $this->resim_adresi = $item->resim_adresi;
    }
}