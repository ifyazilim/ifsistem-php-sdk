<?php namespace SistemApi\Model\Response;

use SistemApi\Model\Reference;
use SistemApi\Model\Response\Base\PagedResponse;

class ReferencePagedResponse extends PagedResponse
{
    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        parent::__construct($item, Reference::class);
    }

    /**
     * @return Reference[]
     */
    public function getReferences()
    {
        return $this->kayitlar;
    }
}