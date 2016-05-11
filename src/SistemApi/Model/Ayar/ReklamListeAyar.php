<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class ReklamListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $isAktif;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'isAktif' => $this->isAktif
        ]);
    }

    /**
     * @param int $isAktif
     * @return ReklamListeAyar
     */
    public function setIsAktif($isAktif)
    {
        $this->isAktif = $isAktif;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsAktif()
    {
        return $this->isAktif;
    }
}