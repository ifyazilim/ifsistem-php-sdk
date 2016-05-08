<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class KullaniciListeAyar extends ListeAyar
{
    /**
     * @var array
     */
    private $ids = [];

    /**
     * @var string
     */
    private $grupKodu;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge([
            'ids' => $this->ids,
            'grupKodu' => $this->grupKodu
        ], parent::toArray());
    }

    /**
     * @return ListeAyar
     */
    public function setOrderByAdi()
    {
        return parent::setOrderBy('adi');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function addId($id)
    {
        $this->ids[] = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param array $ids
     * @return KullaniciListeAyar
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * @param string $grupKodu
     * @return KullaniciListeAyar
     */
    public function setGrupKodu($grupKodu)
    {
        $this->grupKodu = $grupKodu;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrupKodu()
    {
        return $this->grupKodu;
    }
}