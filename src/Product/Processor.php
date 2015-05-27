<?php

namespace Product;

class Processor
{

    public function process(ProductCollection $collection)
    {
        foreach ($collection as $product) {
            $product->setName($product->getName() . ' Test');
        }
    }

}
