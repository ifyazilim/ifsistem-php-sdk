<?php namespace SistemApi\Model;

class GaleriIcerik
{
    public $id;
    public $aciklama;
    public $glr_galeri_id;
    public $embed_kodu;
    public $uzanti;
    public $hash;
    public $durum;
    public $created_at;
    public $updated_at;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->id = $item->id;
        $this->aciklama = $item->aciklama;
        $this->glr_galeri_id = $item->glr_galeri_id;
        $this->embed_kodu = $item->embed_kodu;
        $this->uzanti = $item->uzanti;
        $this->hash = $item->hash;
        $this->durum = $item->durum;
        $this->created_at = $item->created_at;
        $this->updated_at = $item->updated_at;
    }

    public function getResimAdi()
    {
        return sprintf('%d-%s.%s', $this->id, $this->hash, $this->uzanti);
    }

    /**
     * TPL
     *
     * @return string
     */
    public function getResimOrjinalSrc()
    {
        return 'http://siteder1.s3-website-eu-west-1.amazonaws.com/public_site/glr_icerik_resim/orjinal/' . $this->getResimAdi();
    }

    /**
     * TPL
     *
     * @return string
     */
    public function getResimKirpilmisSrc()
    {
        return 'http://siteder1.s3-website-eu-west-1.amazonaws.com/public_site/glr_icerik_resim/kirpilmis/' . $this->getResimAdi();
    }
}