<?php namespace SistemApi\Model;

use Carbon\Carbon;

class MenuEleman
{
    public $id;
    public $adi;
    public $kodu;
    public $ikon;
    public $sira;
    public $menu_id;
    public $adres;
    public $ust_eleman_id;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    /**
     * @var MenuEleman[]
     */
    public $alt_elemanlar = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->kodu)) $this->kodu = $item->kodu;
        if (isset($item->ikon)) $this->ikon = $item->ikon;
        if (isset($item->sira)) $this->sira = $item->sira;
        if (isset($item->menu_id)) $this->menu_id = $item->menu_id;
        if (isset($item->adres)) $this->adres = $item->adres;
        if (isset($item->ust_eleman_id)) $this->ust_eleman_id = $item->ust_eleman_id;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // modeller

        if (isset($item->alt_elemanlar)) {
            foreach ($item->alt_elemanlar as $alt_eleman) {
                $this->alt_elemanlar[] = new MenuEleman($alt_eleman);
            }
        }
    }
}