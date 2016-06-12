<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Product\ProductCategory;
use SistemApi\Model\Response\Base\PagedResponse;

class UrunKategoriPagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, ProductCategory::class);
    }

    /**
     * @deprecated use getKategoriler
     *
     * @return ProductCategory[]
     */
    public function getUrunKategoriler()
    {
        return $this->getKategoriler();
    }

    /**
     * @return ProductCategory[]
     */
    public function getKategoriler()
    {
        return $this->kayitlar;
    }
}