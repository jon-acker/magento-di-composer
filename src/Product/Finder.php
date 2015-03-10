<?php

namespace Product;

class Finder
{
    /**
     * @var Catalog
     */
    private $catalog;

    public function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function findAll()
    {
        $collection = $this->catalog->getCollection();

        return $collection->count();
    }
}