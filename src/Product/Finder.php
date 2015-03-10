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
        return $this->catalog->getCollection();
    }
}