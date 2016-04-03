<?php namespace SistemApi\Model\Inner;

class Sayfalama
{
    /**
     * @var int
     */
    private $toplamKayit;

    /**
     * @var int
     */
    private $toplamSayfa;

    /**
     * @var int
     */
    private $sayfa;

    /**
     * @var int
     */
    private $adet;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        $this->toplamKayit = $item->toplamKayit;
        $this->toplamSayfa = $item->toplamSayfa;
        $this->sayfa = $item->sayfa;
        $this->adet = $item->adet;
    }

    /**
     * Sayfalama'dan bağımsız olarak toplamda kaç adet sonuç olduğunu gösterir.
     *
     * @return int
     */
    public function getToplamKayit()
    {
        return $this->toplamKayit;
    }

    /**
     * Tüm sonuçları almak için toplamda kaç sayfa sorgulanması gerektiğini gösterir.
     *
     * @return int
     */
    public function getToplamSayfa()
    {
        return $this->toplamSayfa;
    }

    /**
     * Bulunan sayfa sayısı, istek sırasında gönderilen sayfa bilgisini içerir.
     *
     * @return int
     */
    public function getSayfa()
    {
        return $this->sayfa;
    }

    /**
     * Dönen kayıt sayısı, istek sırasında gönderilen adet bilgisini içerir.
     *
     * @return int
     */
    public function getAdet()
    {
        return $this->adet;
    }
}