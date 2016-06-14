<?php namespace SistemApi\Model\Ayar;

use SistemApi\Model\Ayar\Base\ListeAyar;

class GaleriIcerikListeAyar extends ListeAyar
{
    /**
     * @var int[]
     */
    private $galeriIds;

    /**
     * @var int
     */
    private $galeriTurId;

    /**
     * @var string[]
     */
    private $galleryCodes;

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'galeri_ids' => $this->galeriIds,
            'galeri_tur_id' => $this->galeriTurId,
            'gallery_codes' => $this->galleryCodes
        ]);
    }

    /**
     * @param int $galeriId
     * @return $this
     */
    public function addGaleriId($galeriId)
    {
        if ($galeriId > 0) {
            $this->galeriIds[] = $galeriId;
            $this->galeriIds = array_unique($this->galeriIds);
        }
        return $this;
    }

    /**
     * @param \int[] $galeriIds
     * @return GaleriIcerikListeAyar
     */
    public function setGaleriIds($galeriIds)
    {
        $this->galeriIds = $galeriIds;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getGaleriIds()
    {
        return $this->galeriIds;
    }

    /**
     * @param int $galeriTurId
     * @return GaleriIcerikListeAyar
     */
    public function setGaleriTurId($galeriTurId)
    {
        $this->galeriTurId = $galeriTurId;
        return $this;
    }

    /**
     * @return int
     */
    public function getGaleriTurId()
    {
        return $this->galeriTurId;
    }

    /**
     * @param string $galleryCode
     * @return $this
     */
    public function addGalleryCode($galleryCode)
    {
        if ( ! is_null($galleryCode)) {
            $this->galleryCodes[] = $galleryCode;
            $this->galleryCodes = array_unique($this->galleryCodes);
        }
        return $this;
    }

    /**
     * @param \string[] $galleryCodes
     * @return GaleriIcerikListeAyar
     */
    public function setGalleryCodes($galleryCodes)
    {
        $this->galleryCodes = $galleryCodes;
        return $this;
    }

    /**
     * @return \string[]
     */
    public function getGalleryCodes()
    {
        return $this->galleryCodes;
    }
}