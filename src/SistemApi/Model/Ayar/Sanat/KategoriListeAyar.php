<?php namespace SistemApi\Model\Ayar\Sanat;

use SistemApi\Model\Ayar\Base\ListeAyar;

class KategoriListeAyar extends ListeAyar
{
    /**
     * @var int
     */
    private $ustId;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'ustId' => $this->ustId
        ]);
    }

    /**
     * @param mixed $ustId
     * @return $this"
     */
    public function setUstId($ustId)
    {
        $this->ustId = $ustId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUstId()
    {
        return $this->ustId;
    }
}