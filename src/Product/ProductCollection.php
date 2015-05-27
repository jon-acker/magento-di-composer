<?php

namespace Product;

interface ProductCollection extends \IteratorAggregate
{
    public function getIterator();
}
