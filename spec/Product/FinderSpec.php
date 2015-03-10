<?php

namespace spec\Product;

use PhpSpec\ObjectBehavior;
use Product\Catalog;
use Prophecy\Argument;

class FinderSpec extends ObjectBehavior
{
    function let(Catalog $catalog)
    {
        $this->beConstructedWith($catalog);
    }

    function it_finds_all_products_in_the_catalog(Catalog $catalog)
    {
        $catalog->getCollection()->willReturn([1, 2, 3]);

        $this->findAll()->shouldHaveCount(3);
    }
}
