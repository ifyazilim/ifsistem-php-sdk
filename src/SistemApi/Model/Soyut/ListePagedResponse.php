<?php namespace SistemApi\Model\Soyut;

use SistemApi\Model\Inner\Sayfalama;

abstract class ListePagedResponse
{
    /**
     * @var Sayfalama
     */
    private $sayfalama;

    /**
     * @var array
     */
    protected $kayitlar = [];

    /**
     * @param \stdClass $item
     * @param $class
     */
    public function __construct($item, $class)
    {
        // sayfalama oluşturalım
        $this->sayfalama = new Sayfalama($item->sayfalama);

        // kayıtlar üzerinde dönelim
        foreach ($item->kayitlar as $kayit) {
            $this->kayitlar[] = new $class($kayit);
        }
    }

    /**
     * @return Sayfalama
     */
    public function getSayfalama()
    {
        return $this->sayfalama;
    }
}