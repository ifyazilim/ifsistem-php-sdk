<?php namespace SistemApi\Model\Menu;

class Eleman
{
    public $id;
    public $adi;
    public $kodu;
    public $ikon;
    public $sira;
    public $menu_id;
    public $tur;
    public $tur_id;
    public $adres;
    public $ust_eleman_id;
    public $durum;
    public $kayit_zamani;

    /**
     * @var Eleman[]
     */
    public $alt_elemanlar = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->adi = $item->adi;
        $this->kodu = $item->kodu;
        $this->ikon = $item->ikon;
        $this->sira = $item->sira;
        $this->menu_id = $item->menu_id;
        $this->tur = $item->tur;
        $this->tur_id = $item->tur_id;
        $this->adres = $item->adres;
        $this->ust_eleman_id = $item->ust_eleman_id;
        $this->durum = $item->durum;

        if (isset($item->alt_elemanlar)) {
            foreach ($item->alt_elemanlar as $alt_eleman) {
                $this->alt_elemanlar[] = new Eleman($alt_eleman);
            }
        }
    }
}