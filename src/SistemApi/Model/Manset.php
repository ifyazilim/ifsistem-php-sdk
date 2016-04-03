<?php namespace SistemApi\Model;

class Manset
{
    public $id;
    public $baslik;
    public $link;
    public $kategori_id;
    public $sira;
    public $resim_uzantisi;
    public $site_id;
    public $durum;
    public $hash;
    public $created_at;
    public $updated_at;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->baslik = $item->baslik;
        $this->link = $item->link;
        $this->kategori_id = $item->kategori_id;
        $this->sira = $item->sira;
        $this->resim_uzantisi = $item->resim_uzantisi;
        $this->site_id = $item->site_id;
        $this->durum = $item->durum;
        $this->hash = $item->hash;
        $this->created_at = $item->created_at;
        $this->updated_at = $item->updated_at;
    }

    /**
     * @return string
     */
    public function getResimSrc()
    {
        return 'http://siteder1.s3-website-eu-west-1.amazonaws.com/public_site/mansetler/' . $this->getResimAdi();
    }

    /**
     * @return string
     */
    public function getResimAdi()
    {
        return sprintf('%d-%s.%s', $this->id, $this->hash, $this->resim_uzantisi);
    }
}