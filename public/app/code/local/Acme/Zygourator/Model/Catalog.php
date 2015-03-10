<?php

use Product\Catalog;

class Acme_Zygourator_Model_Catalog extends Mage_Catalog_Model_Product implements Catalog
{
    public function getCollection()
    {
        $collection = parent::getCollection();

        return $collection;
    }
}