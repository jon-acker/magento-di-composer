<?php

namespace spec\Product;

use ArrayIterator;
use PhpSpec\ObjectBehavior;
use Product;
use Product\ProductCollection;
use Prophecy\Argument;

class ProcessorSpec extends ObjectBehavior
{
    function it_changes_titles_of_products_for_listing(ProductCollection $collection, Product $product1, Product $product2)
    {
        $product1->getName()->willReturn('Name1');
        $product2->getName()->willReturn('Name2');

        $product1->setName('Name1 Test')->shouldBeCalled();
        $product2->setName('Name2 Test')->shouldBeCalled();

        $product1->setPrice(9.99)->shouldBeCalled();
        $product2->setPrice(9.99)->shouldBeCalled();

        $collection->getIterator()->willReturn(new ArrayIterator([
            $product1->getWrappedObject(),
            $product2->getWrappedObject()
        ]));

        $this->process($collection);
    }
}
