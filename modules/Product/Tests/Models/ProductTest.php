<?php

namespace Modules\Order\Tests\Models;

use Modules\Product\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{

    public function test_it_creates_an_order()
    {
        $order = new Product();
        $this->assertInstanceOf(Product::class, $order);
    }
}
